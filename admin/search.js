//Syncronus = butuh trigger(pemacu) kaya harus di klik button dlu gitu
//sedangkan Ansycronus = live (tidak butuh pemacu)
let keyword = document.getElementById('keyword');
let container = document.getElementById('container');
keyword.addEventListener('keypress', function () {
    //buat objek ajax
    let xhr = new XMLHttpRequest();

    //mengecek ajaxnya
    xhr.onreadystatechange = function () {
        if (xhr.readyState == 4 && xhr.status == 200) {
            //  console.log(xhr.responseText);
            //  //response text diatas = Sumber nya atau(didalam folder ajax/coba.txt ditampilkan semua)
            container.innerHTML = xhr.responseText;
        }
    }
    //ansycronus = true sedangkan false = syncronus
    xhr.open(
        'GET',
        'ajax_search/search.php?keyword=' + keyword.value,
        true
    );
    xhr.send();
})