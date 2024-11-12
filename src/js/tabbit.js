(function($) {
 
  $.fn.tabbit = function(options) {
    
    const initTabbit = function(index, element) {
      // create or increment global var to use in auto ID creation when mutliple tabbed components are on one page 
      if (window.tabbitComponentCount) {
        window.tabbitComponentCount++;
      } else {
        window.tabbitComponentCount = 1;
      }
      const $tabbed = $(element); // tabbed component container
      const $tablist = $tabbed.find('ul').first(); // list of tabbed component controls buttons
      const $tabs = $tablist.find('a'); // tabbed component control links
      const $panels = $tabbed.children('section'); // tabbed component panels that will hide/show
      
      const switchTab = function(oldTab, newTab) {
        newTab.focus();
        // make inner content focusable for keyboard nav
        newTab.removeAttribute('tabindex');
        // Set the selected state
        newTab.setAttribute('aria-selected', 'true');
        oldTab.removeAttribute('aria-selected');
        // make hidden inner content not focusable for keyboard nav  
        oldTab.setAttribute('tabindex', '-1');
        // Get the indices of the new and old tabs to find the correct tab panels to show and hide
        let index = $tabs.index(newTab);
        let oldIndex = $tabs.index(oldTab);
        $panels[oldIndex].hidden = true;
        $panels[index].hidden = false;
        // fire an event so other scripts know what just happened
        // get the newly active tab name either via data-tab-name attribute if existing or use the anchor link text
        let newTabName = $(newTab).data('tab-name') || $(newTab).text();
        $tabbed.trigger('tabSwitch', {
          'tabbedId' : $tabbed.attr('id'),
          'activeTabId' : newTab.getAttribute('id'),
          'activeTabName' : newTabName
        });
      }
      
      // give the component controls proper semantics
      $tablist.attr('role', 'tablist');
      
      $tabs.each(function(i, tab) {
        let $tab = $(tab);
        let tabId = `tab${window.tabbitComponentCount}-${i + 1}`; // auto generated tab ID
        if (
          (settings.panelIdCreation == 'auto') || // using auto generated panel IDs
          (settings.panelIdCreation == 'existing' && $panels.eq(i).attr('id') === undefined) // tried to use existing panel IDs but it doesn't exist on corresponding panel
        ) {
          // override the tab control link's href attribute if panel IDs are being auto generated
          let correspondingPanelAutoGenId = `#panel${window.tabbitComponentCount}-${i + 1}`;
          $tab.attr('href', correspondingPanelAutoGenId); 
        }
        if (settings.tabIdCreation == 'existing' && $tab.attr('id') === undefined) {
          console.warn('TABBIT: Tab ID Setting is "existing" but there is no ID on this tab. An ID will be auto generated.\n The tab: ', $tab.get(0));
        }
        if (settings.tabIdCreation == 'href' && $tab.attr('href') === undefined) {
          console.warn('TABBIT: Tab ID Setting is "href" but there is no href on this tab. An ID will be auto generated.\n The tab: ', $tab.get(0));
        }
        if (settings.tabIdCreation == 'href' && $tab.attr('href')) {
          tabId = 'tab-' + $tab.attr('href').replace('#',''); // generate an ID using the link's href value
        } else if (settings.tabIdCreation == 'existing' && $tab.attr('id')) {
          tabId = $tab.attr('id'); // use the ID that's already on the tab
        }
        
        $tab.attr({
          'role' : 'tab',
          'id' : tabId,
          'tabindex' : '-1'
        });

        $tab.parent().attr('role', 'presentation');

        $tab.on('click', function(e) {
          e.preventDefault();
          let currentTab = $tablist.find('[aria-selected]').get(0);
          if (e.currentTarget !== currentTab) {
            switchTab(currentTab, e.currentTarget);
          }
        });
        
        $tab.on('keydown', function(e) {
          let index = $tabs.index(e.currentTarget);
          let  dir = e.which === 37 ? index - 1 : e.which === 39 ? index + 1 : e.which === 40 ? 'down' : null;
          if (dir !== null) {
            e.preventDefault();
            dir === 'down' ? $panels[i].focus() : $tabs[dir] ? switchTab(e.currentTarget, $tabs[dir]) : void 0;
          }
        });
      });
      
      $panels.each(function(i, panel) {
        let $panel = $(panel);
        let panelId = `panel${window.tabbitComponentCount}-${i + 1}`; // auto generated ID
        if (settings.panelIdCreation == 'existing' && $panel.attr('id') === undefined) {
          console.warn('TABBIT: Panel ID Setting is "existing" but there is no ID on this panel. An ID will be auto generated.\n The panel: ', $panel.get(0));
        }
        if (settings.panelIdCreation == 'existing' && $panel.attr('id')) {
          panelId = $panel.attr('id'); // existing ID on the element
        }
        $panel.attr({
          'id' : panelId,
          'role' : 'tabpanel',
          'tabindex' : '-1',
          'aria-labelledby' : $tabs[i].id
        });
        $panel.prop('hidden', true);
      });
      
      $tabs[0].removeAttribute('tabindex');
      $tabs[0].setAttribute('aria-selected', 'true');
      $panels[0].hidden = false;
       
    }
    
    const settings = $.extend(
      {
        tabIdCreation: 'auto', // options: 'auto', 'href' 'existing'
        panelIdCreation: 'auto' // options: 'auto', 'existing'
      },
      options
    );
    
    return this.each(initTabbit);
  }
  
})(jQuery);