<?php

/**
 * Displays the Special Heading component
 */

$spreadsheet_info = get_sub_field('spreadsheet_info');

?>

<div class="spreadsheet-wrapper">
    <table>
        <thead>
            <tr>
                <th>Year Acquired</th>
                <th>Units</th>
                <th>Market</th>
                <th>State</th>
                <th>Year Built</th>
                <th>Purchase Price</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($spreadsheet_info as $spreadsheet_data) :
                $year_acquired = $spreadsheet_data['year_acquired'];
                $units = $spreadsheet_data['units'];
                $market = $spreadsheet_data['market'];
                $state = $spreadsheet_data['state'];
                $year_built = $spreadsheet_data['year_built'];
                $purchase_price = $spreadsheet_data['purchase_price'];
            ?>
                <tr>
                    <td><?php echo $year_acquired ?></td>
                    <td><?php echo $units ?></td>
                    <td><?php echo $market ?></td>
                    <td><?php echo $state ?></td>
                    <td><?php echo $year_built ?></td>
                    <td>$<?php echo $purchase_price ?></td>
                </tr>
            <?php endforeach ?>
        </tbody>
    </table>

</div>