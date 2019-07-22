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
	const errBlank = " không được trống";

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
            if (!validImageTypes.includes($('#' + idfile).get(0).files['type'])) {
                check = false
                showError("errorfile1", "Chị nhận file ảnh");
            } else {
                showError("errorfile1", "");
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
            }
            else if ($("#" + idnoImg).val() > 99) {
                check = false
                showError(errornoImg, "stt phải < 99");
            }
			else {
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
    $('#modalpost').modal('show');
    if (check) {
        $('#modalpost').modal('show');
    } else {
        alert("have error please check data");
    }
}

function fnc_SavePost() {
    $("#frpost").submit();
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