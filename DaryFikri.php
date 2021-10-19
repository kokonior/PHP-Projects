<?php

function salam($name = 'Admin' ) {
	return "Selamat Datang, $name";
}

function salam($date = 'Selamat Datang', $name = 'admin') {
	return "Selamat $date, $name";
}

$x = 9;
$y = 3;



echo "=================================== <br/>";
// FUngsi penjumlahan
function functionPenambahan($x, $y)
{
    $HasilPenambahan = $x + $y;
    return $HasilPenambahan;
}
// FUngsi Perkalian
function functionPerkalian($x, $y)
{
    $HasilPerkalian = $x * $y;
    return $HasilPerkalian;
}
// Fungsi Pengurangan
function functionPengurangan($x, $y)
{
    $HasilPengurangan = $x - $y;
    return $HasilPengurangan;
}
// Fungsi Pembagian
function functionPembagian($x, $y)
{
    $HasilPembagian = $x / $y;
    return $HasilPembagian;
}

echo "Hasil Penjumlahan adalah :" . functionPenambahan(9, 3) . "<br/>";
echo "Hasil Pengurangan adalah :" . functionPengurangan(9, 3) . "<br/>";
echo "Hasil Perkalian adalah :"  . functionPerkalian(9, 3) . "<br/>";
echo "Hasil Penjumlahan adalah :" . functionPembagian(9, 3) . "<br/>";

?>

<td class="cell-<?= $i ?> <?= $additionalClass ?>">
                <?php if (getCell($i) === 'x'): ?>
                    X
                <?php elseif (getCell($i) === 'o'): ?>
                    O
                <?php else: ?>
                    <input type="radio" name="cell" value="<?= $i ?>" onclick="enableButton()"/>
                <?php endif; ?>
            </td>

        <?php } ?>

        </tr>
        </tbody>
    </table>

    <button type="submit" disabled id="play-btn">Play</button>

</form>

<script type="text/javascript">
    function enableButton() {
        document.getElementById('play-btn').disabled = false;
    }
</script>

<?php
require_once "templates/footer.php";
