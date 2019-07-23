$(document).ready(function () {

});
var validImageTypes = ['image/jpg', 'image/jpeg', 'image/png'];

var arrNo = [];
function fnc_SubmitPost() {
    var name = $("#name").val();
    var keyword = $("#keyword").val();
    var description = $("#description").val();
    var title = $("#title").val();
    var noImg = $("#noImg").val();

    var faccity_conten = $("#faccity_conten").val();
    var bed_room = $("#bed_room").val();
    var bath_room = $("#bath_room").val();
    var min_night = $("#min_night").val();
    var max_people = $("#max_people").val();
    var price = $("#price").val();
    var sub_text = $("#sub_text").val();
    const errBlank = "Không được trống";

    var check = true;
    if (name === "" || name === undefined || name === null) {
        check = false
        showError("errorname", "name" + errBlank);
    } else {
        showError("errorname", "");
    }
    if (keyword === "" || keyword === undefined || keyword === null) {
        check = false
        showError("errorkeyword", "keyword" + errBlank);
    } else {
        showError("errorkeyword", "");
    }
    if (description === "" || description === undefined || description === null) {
        check = false
        showError("errordescription", "description" + errBlank);
    } else {
        showError("errordescription", "");
    }

    if (title === "" || title === undefined || title === null) {
        check = false
        showError("errortitle", "title" + errBlank);
    } else {
        showError("errortitle", "");
    }

    if (noImg === "" || noImg === undefined || noImg === null) {
        check = false
        showError("errornoImg", "stt" + errBlank);
    } else {
        if (noImg < 1) {
            check = false
            showError("errornoImg", "stt phải > 0");
        } else {
            showError("errornoImg", "");
        }
    }
    if (faccity_conten === "" || faccity_conten === undefined || faccity_conten === null) {
        check = false
        showError("errorfaccity_conten", "faccity_conten" + errBlank);
    } else {
        if (faccity_conten < 1) {
            check = false
            showError("errorfaccity_conten", "faccity_conten phải > 0");
        } else {
            showError("errorfaccity_conten", "");
        }
    }
    if (bed_room === "" || bed_room === undefined || bed_room === null) {
        check = false
        showError("errorbed_room", "bed_room" + errBlank);
    } else {
        if (bed_room < 1) {
            check = false
            showError("errorbed_room", "bed_room phải > 0");
        } else {
            showError("errorbed_room", "");
        }
    }

    if (bath_room === "" || bath_room === undefined || bath_room === null) {
        check = false
        showError("errorbath_room", "bath_room" + errBlank);
    } else {
        if (bath_room < 1) {
            check = false
            showError("errorbath_room", "bath_room phải > 0");
        } else {
            showError("errorbath_room", "");
        }
    }
    if (min_night === "" || min_night === undefined || min_night === null) {
        check = false
        showError("errormin_night", "min_night" + errBlank);
    } else {
        if (min_night < 1) {
            check = false
            showError("errormin_night", "min_night phải > 0");
        } else {
            showError("errormin_night", "");
        }
    }
    if (max_people === "" || max_people === undefined || max_people === null) {
        check = false
        showError("errormax_people", "max_people" + errBlank);
    } else {
        if (max_people < 1) {
            check = false
            showError("errormax_people", "max_people phải > 0");
        } else {
            showError("errormax_people", "");
        }
    }
    if (price === "" || price === undefined || price === null) {
        check = false
        showError("errorprice", "price" + errBlank);
    } else {
        if (price < 1) {
            check = false
            showError("errorprice", "price phải > 0");
        } else {
            showError("errorprice", "");
        }
    }

    var arrExit = [];
    arrNo = [];
    for (i = 1; i < 10; i++) {
        var idfile = 'file' + i;
        var idalt = 'alt' + i;
        var idnoImg = 'noImg' + i;
        var errorfile = "errorfile" + i;
        var erroralt = "erroralt" + i;
        var errornoImg = "errornoImg" + i;

        if ($('#' + idfile).get(0).files.length === 0) {
            check = false
            showError(errorfile, "Chưa chọn ảnh");
        } else {
            if (!validImageTypes.includes($('#' + idfile).get(0).files[0]['type'])) {
                check = false
                showError(errorfile, "Chị nhận file ảnh");
            } else {
                if (($('#' + idfile).get(0).files[0].size / 1024) >= 1024) {
                    showError(errorfile, "Ảnh không được quá 1Mb");
                } else {
                    showError(errorfile, "");
                }
            }
        }

        if ($("#" + idalt).val() === "" || $("#" + idalt).val() === undefined || $("#" + idalt).val() === null) {
            check = false
            showError(erroralt, "alt" + errBlank);
        } else {
            showError(erroralt, "");
        }

        if ($("#" + idnoImg).val() === "" || $("#" + idnoImg).val() === undefined || $("#" + idnoImg).val() === null) {
            check = false
            showError(errornoImg, "stt" + errBlank);
        } else {
            if ($("#" + idnoImg).val() < 1) {
                check = false
                showError(errornoImg, "stt phải > 0");
            } else {
                arrNo.push($("#" + idnoImg).val());
                showError(errornoImg, "");
            }
        }
    }

    // tìm những số thứ tự bị trùng
    for (i = 0; i < 9; i++) {
        arrNo.forEach(function (value, index) {
            if (value === arrNo[i] && i !== index) {
                if (arrExit.length > 0) {
                    var find = arrExit.find(function (item) {
                        return item === (index + 1);
                    });
                    if (find === undefined) {
                        arrExit.push((index + 1));
                    }
                } else {
                    arrExit.push((index + 1));
                }
            }
        });
    }

    arrExit.forEach(function (value, index) {
        var errornoImg = "errornoImg" + value;
        showError(errornoImg, "stt bị trùng");
    });
    
    if (check) {
        fnd_ShowData();
        $('#modalpost').modal('show');
    } else {
        alert("have error please check data");
    }
}

function fnc_SavePost() {
    $("#frpost").submit();
}

function fnd_ShowData() {
    $("#modal_type").text($("#type option:selected").text());
    $("#modal_name").text($("#name").val());
    $("#modal_keyword").text($("#keyword").val());
    $("#modal_description").text($("#description").val());
    $("#modal_title").text($("#title").val());
    $("#modal_area").text($("#area option:selected").text());
    $("#modal_noImg").text($("#noImg").val());
    $("#modal_faccity_conten").text($("#faccity_conten").val());
    $("#modal_bed_room").text($("#bed_room").val());
    $("#modal_bath_room").text($("#bath_room").val());
    $("#modal_min_night").text($("#min_night").val());
    $("#modal_max_people").text($("#max_people").val());
    $("#modal_price").text($("#price").val());
    $("#modal_sub_text").text($("#sub_text").val());

    var modal_src1 = 'modal_src' + $("#noImg1").val();
    var reader1 = new FileReader();
    reader1.onload = function () {
        var srcshow = document.getElementById(modal_src1);
        srcshow.src = reader1.result;
    };
    reader1.readAsDataURL($('#file1').get(0).files[0]);

    var modal_src2 = 'modal_src' + $("#noImg2").val();
    var reader2 = new FileReader();
    reader2.onload = function () {
        var srcshow = document.getElementById(modal_src2);
        srcshow.src = reader2.result;
    };
    reader2.readAsDataURL($('#file2').get(0).files[0]);

    var modal_src3 = 'modal_src' + $("#noImg3").val();
    var reader3 = new FileReader();
    reader3.onload = function () {
        var srcshow = document.getElementById(modal_src3);
        srcshow.src = reader3.result;
    };
    reader3.readAsDataURL($('#file3').get(0).files[0]);

    var modal_src4 = 'modal_src' + $("#noImg4").val();
    var reader4 = new FileReader();
    reader4.onload = function () {
        var srcshow = document.getElementById(modal_src4);
        srcshow.src = reader4.result;
    };
    reader4.readAsDataURL($('#file4').get(0).files[0]);

    var modal_src5 = 'modal_src' + $("#noImg5").val();
    var reader5 = new FileReader();
    reader5.onload = function () {
        var srcshow = document.getElementById(modal_src5);
        srcshow.src = reader5.result;
    };
    reader5.readAsDataURL($('#file5').get(0).files[0]);

    var modal_src6 = 'modal_src' + $("#noImg6").val();
    var reader6 = new FileReader();
    reader6.onload = function () {
        var srcshow = document.getElementById(modal_src6);
        srcshow.src = reader6.result;
    };
    reader6.readAsDataURL($('#file6').get(0).files[0]);

    var modal_src7 = 'modal_src' + $("#noImg7").val();
    var reader7 = new FileReader();
    reader7.onload = function () {
        var srcshow = document.getElementById(modal_src7);
        srcshow.src = reader7.result;
    };
    reader7.readAsDataURL($('#file7').get(0).files[0]);

    var modal_src8 = 'modal_src' + $("#noImg8").val();
    var reader8 = new FileReader();
    reader8.onload = function () {
        var srcshow = document.getElementById(modal_src8);
        srcshow.src = reader8.result;
    };
    reader8.readAsDataURL($('#file8').get(0).files[0]);

    var modal_src9 = 'modal_src' + $("#noImg9").val();
    var reader9 = new FileReader();
    reader9.onload = function () {
        var srcshow = document.getElementById(modal_src9);
        srcshow.src = reader9.result;
    };
    reader9.readAsDataURL($('#file9').get(0).files[0]);

    // for (i = 1; i < 10; i++) {
    //     var idalt = 'alt' + i;
    //     var idnoImg = 'noImg' + i;
    //     var modal_idalt = 'modal_alt' + i;
    //     var modal_idnoImg = 'modal_noImg' + i;
    //     $("#" + modal_idalt).text($("#" + idalt).val());
    //     $("#" + modal_idnoImg).text($("#" + idnoImg).val());
    //     var idfile = 'file' + i;
    //     var modal_src = 'modal_src' + $("#" + idnoImg).val();
    //     var reader = new FileReader();
    //     reader.onload = function () {
    //         var srcshow = document.getElementById(modal_src);
    //         srcshow.src = reader.result;
    //     };
    //     reader.readAsDataURL($('#' + idfile).get(0).files[0]);
    // }
}

function showError(id, strerror) {
    if (strerror === "") {
        $("#" + id).text("");
        $("#" + id).hide();
    } else {
        $("#" + id).text(strerror);
        $("#" + id).show();
    }

}