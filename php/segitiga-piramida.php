<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Segitiga Karakter</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 text-gray-800">
  <main class="max-w-3xl mx-auto p-4">
    <form method="post">
      <div class="mb-4">
        <label class="block text-sm font-medium text-gray-700">Simbol:</label>
        <input type="text" name="simbol" maxlength="3" value="*" class="p-2 mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
      </div>
      <div class="mb-4">
        <label class="block text-sm font-medium text-gray-700">Jumlah baris: </label>
        <input type="number" name="jumlah" min="1" value="3" class="p-2 mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
      </div>
      <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Buat Segitiga</button>
    </form>

    <div class="mt-6">
      <h2 class="text-lg font-semibold mb-2">Hasil:</h2>
      <div class="bg-white p-4 rounded shadow text-center font-mono whitespace-pre-line">
        <?php
          $simbol = $_POST['simbol'] ?? '*'; 
          
          // if(isset($_POST['simbol'])) {
          //   $simbol = $_POST['simbol'];
          // }else{
          //   $simbol = '*';
          // }
          
          // $simbol = $_POST['simbol'] ? $_POST['simbol'] : '*';

          $jumlah = $_POST['jumlah'] ?? 0;

          // Perulangan baris
          for ($i = 1; $i <= $jumlah; $i++) {
              // 1. Cetak spasi di kiri
              for ($s = 1; $s <= $jumlah - $i; $s++) {
                  echo "&nbsp;"; // spasi
              }
              // 2. Cetak simbol (jumlah ganjil: 1, 3, 5, ...)
              for ($k = 1; $k <= 2 * $i - 1; $k++) {
                  echo $simbol;
              }
              // 3. Pindah baris
              echo "<br/>";
          }
        ?>
      </div>
    </div>
    
  </main>
</body>
</html>