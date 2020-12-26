//hàm kiểm tra biến đã được định nghĩa hay chưa
function isset(variable) {
    return (typeof variable === 'undefined' || variable === null) ? true : false;
}

function removeSubmit() {
    return false;
}

//Hàm kiểm tra năm nhuận
function leapYear(year) {
    if (year % 4 == 0 && year % 100 != 0 || year % 400 == 0) {
        return true;
    }
    return false;
}

function enter() {
    document.click() = function(event) {
        if (event.keyCode === 13) {
            document.getElementById(id).click();
        }
    }
}
//Hàm kiểm tra số ngày của mỗi tháng
function dayOfMonth() {
    var monthObj = document.getElementById('inputMonth');
    var yearObj = document.getElementById('inputYear');
    var result = document.getElementById('outputDay');
    var day = 0;
    var month = parseInt(monthObj.value);
    var year = parseInt(yearObj.value);
    var error = false;
    //dặt lại giá trị màu border
    monthObj.style.border = "2px solid #2AF1EF";
    yearObj.style.border = "2px solid #2AF1EF";
    //xử lý lỗi
    if (isNaN(month) || month <= 0) {
        monthObj.style.border = "2px solid red";
        alert("Tháng không đúng hoặc bạn chưa nhập Tháng");
        error = true;
    }
    if (isNaN(year) || year <= 0) {
        yearObj.style.border = "2px solid red";
        alert("Năm không đúng hoặc bạn chưa nhập Năm");
        error = true;
    }
    if (!error) {
        switch (month) {
            case 1:
            case 3:
            case 5:
            case 7:
            case 8:
            case 10:
            case 12:
                {
                    day = 31;
                    break;
                }
            case 4:
            case 6:
            case 9:
            case 11:
                {
                    day = 30;
                    break;
                }
            case 2:
                {
                    day = (leapYear(year)) ? 29 : 28;
                }
        }
        result.value = "Tháng " + month + " năm " + year + " có " + day + " ngày";
    }
}

//Hàm tính năm Âm lịch
function lunarYear() {
    var so_can, so_chi, can, chi, ket_qua;
    var year = parseInt(document.getElementById("calendarYear").value);
    console.log(year);
    so_can = (year - 3) % 10;
    so_chi = (year - 3) % 12;
    if (year <= 0 || isNaN(year)) {
        alert("Năm không hợp lệ");
        return false;
    }
    var arr_can = ['Quý', 'Giáp', 'Ất', 'Bính', 'Đinh', 'Mậu', 'Kỉ', 'Canh', 'Tân', 'Nhâm'];
    var arr_chi = ['Hợi', 'Tí', 'Sửu', 'Dần', 'Mão', 'Thìn', 'Tỵ', 'Ngọ', 'Mùi', 'Thân', 'Dậu', 'Tuất', 'Hợi'];
    can = arr_can[so_can];
    chi = arr_chi[so_chi];
    ket_qua = can + " " + chi;
    document.getElementById("outputLunarYear").value = ket_qua;
}

//Hàm tính lương của công nhân
function salaryCalculation() {
    var salary = parseFloat(document.getElementById('inputSalary').value);
    var realSalary = 0;
    var tax = 0;
    if (salary <= 0 || isNaN(salary)) {
        alert('Lương không hợp lệ');
        return false;
    }
    tax = (salary >= 15000000) ? 0.3 : (salary >= 7000000) ? 0.2 : 0.1;
    realSalary = salary - (salary * tax);
    document.getElementById('tax').innerHTML = "Thuế: " + tax * salary;
    document.getElementById('realSalary').innerHTML = "Lương thực sự: " + realSalary;
}