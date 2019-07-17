function checkId() {
    var id = document.getElementById('ma').value;
    alert("ctr_sanpham.php?ktma="+id);
    var url = "ctr_sanpham.php?ktma="+id;
    var data = {
    };
    var success = function (result){
        $('#result').html(result);
    };
    var dataType = 'text';
    $.get(url, data, success, dataType);
}

function kiemTraMa(id) {
        var url = "kiemtrama.php?ma=" + id;
        var data = {};
        var success = function (result) {
            $('#checkid').html(result);
        };
        var dataType = 'text';
        $.get(url, data, success, dataType);
}
function kiemTraMaSua(idsua,id) {
    var url = "kiemtrama.php?masua=" + idsua+"&mahientai="+id;
    var data = {};
    var success = function (result) {
        $('#checkid').html(result);
    };
    var dataType = 'text';
    $.get(url, data, success, dataType);
}

function hienMa(id,size){
    document.getElementById('maxoa').value= id;
    document.getElementById('sizexoa').value= size;
}
function datAnh() {
    var value = document.getElementById('fileanh').value;
    var vitri = value.lastIndexOf("\\");
    document.getElementById('anh').value = value.slice(vitri+1,value.length);
}