<?php
$a1 = [-1, -2, -3, -4, -5, -6, -7, -8, -9, -10];
$a2 = [-1, 1, -2, 2, 3, -3, -4, 5];
$a3 = [-0.01, -0.0001, -.15];
$a4 = ["-1", "2", "-3", "4", "-5", "5", "-6", "6", "-7", "7"];

function bePositive($arr) {
    echo "<br>Processing Array:<br><pre>" . var_export($arr, true) . "</pre>";
    echo "<br>Positive output:<br>";
    //TODO use echo to output all of the values as positive (even if they were originally positive)
    /* nff4 2/13/23 explanation: if it's a string type cast the value to a float to check if it's less than 0, if so, remove the minus sign with substr. 
    If $value is not a string, then check if the value is less than 0 and apply the absolute value function to it to make it positive while keeping the same data type. */
    foreach ($arr as $value) {      
        if (getType($value) == 'string') {
            if ((float)$value < 0) {
                echo var_dump(substr($value, 1));
            }
            else {
                echo var_dump($value);
            }
        }
        else {
            if ($value < 0) {
                echo var_dump(abs($value));
            }
            else {
                echo var_dump($value);
            }
        }
    }
    //hint: may want to use var_dump() to show final data types OK
}
echo "Problem 3: Be Positive<br>";
?>
<table>
    <thread>
        <th>A1</th>
        <th>A2</th>
        <th>A3</th>
        <th>A4</th>
    </thread>
    <tbody>
        <tr>
            <td>
                <?php bePositive($a1); ?>
            </td>
            <td>
                <?php bePositive($a2); ?>
            </td>
            <td>
                <?php bePositive($a3); ?>
            </td>
            <td>
                <?php bePositive($a4); ?>
            </td>
        </tr>
</table>
<style>
    table {
        border-spacing: 2em 3em;
        border-collapse: separate;
    }

    td {
        border-right: solid 1px black;
        border-left: solid 1px black;
    }
</style>