const RANGE = 180; //khoang cach giua 2 ong
var frame = null;
var obj = document.getElementById('cvs');
var obj2 = document.getElementById('btn');
var ctx2 = obj2.getContext('2d');
var ctx = obj.getContext("2d");
var birdImg = new Image();
var background = new Image();
var topPipe = new Image();
var bottomPipe = new Image();
var bottomBc = new Image();
var flyBird = new Image();
var score = 0;

//ẢNH CỦA CÁC THÀNH PHẦN TRONG GAME
birdImg.src = "../image/bird.png";
background.src = "../image/bc4.jpg";
topPipe.src = "../image/ongtren.png";
flyBird.src = "../image/fly.png";
bottomPipe.src = "../image/ongduoi.png";
bottomBc.src = "../image/bcbtn2.jpg";

//CON CHIM
var bird = {
    x: 82,
    y: 100
};
var cham_cot = false;
var listBackground = [{ x: 0, y: 0 }, { x: 380, y: 0 }]; //mảng chứa các hình nền lặp
var listPipe = []; //mảng chứa các ống nước lặp
listPipe[0] = { x: obj.width, y: 0 }; //tọa độ ống nước đầu tiên
var yBottom = 0; //tọa độ ống nước dưới
var vt_tao_cot_moi = 90; //vị trí tạo cột mới càng nhỏ thì khoảng cách |.| các cột càng lớn

//hàm Bắt Đầu game
function gameStart() {
    var manHinhStart = document.getElementById("start");
    var btn_play = document.querySelector('#start-button');
    var check = window.getComputedStyle(manHinhStart, null).display;
    console.log(check);
    btn_play.addEventListener("click", function() {
        manHinhStart.style.display = "none";
        requestAnimationFrame(run);
    });

}
//hàm Kết Thúc game
function gameEnd() {
    var btn_restart = document.querySelector('#end-restart');
    var manHinhEnd = document.querySelector('#end');
    manHinhEnd.style.display = 'block';
    document.querySelector('#end-score').innerHTML = "SCORE: " + score;
    btn_restart.addEventListener('click', function() {
        location.reload();
    });

}
//=========================================================================================================
function run() {

    //VẼ NỀN TRÊN
    ctx.drawImage(background, 0, 0);

    //VẼ NỀN DƯỚI
    for (var i = 0; i < listBackground.length; ++i) {
        ctx2.drawImage(bottomBc, listBackground[i].x, listBackground[i].y);
        if (listBackground[i].x <= (-bottomBc.width)) {
            listBackground[i].x = bottomBc.width
        }

        listBackground[i].x -= 3;

        console.log(listBackground);
    }

    //VẼ CON CHIM
    ctx.drawImage(birdImg, bird.x, bird.y);

    //VẼ ỐNG NƯỚC
    for (var pipe of listPipe) {
        //vẽ ống trên
        ctx.drawImage(topPipe, pipe.x, pipe.y);
        //vẽ ống dưới
        yBottom = topPipe.height + pipe.y + RANGE;
        ctx.drawImage(bottomPipe, pipe.x, yBottom);
        //xử lý va chạm
        if (bird.y + birdImg.height >= obj.height ||
            (bird.x + birdImg.width >= pipe.x && bird.x <= pipe.x + topPipe.width) && (bird.y <= pipe.y + topPipe.height || bird.y + birdImg.height >= yBottom)) {
            cham_cot = true;
            gameEnd();
            //document.querySelector('#end').style.display = "block";
            return false;
        }
        //tính điểm
        //
        console.log(bird.x + birdImg.width);
        console.log(pipe.x);
        if (bird.x + birdImg.width == pipe.x) {
            score += 100;
            if (score % 500 == 0 && score != 0) {
                vt_tao_cot_moi = 3 * (vt_tao_cot_moi / 3 + 1);
                if (vt_tao_cot_moi > 120) vt_tao_cot_moi = 30;
                // return;
            }
            document.getElementById('score').innerHTML = score;
        }
        //xóa ống khi không còn nhìn thấy
        if (pipe.x <= (-topPipe.width)) {
            listPipe.shift();
        }
        //thêm ống mới
        if (pipe.x == vt_tao_cot_moi) {
            //random lượng tăng giảm để xác định độ dài của 2 ống mói
            var change = (Math.floor(Math.random() * topPipe.height)) - topPipe.height;
            listPipe.push({ x: obj.width, y: change });

        }
        //di chuyển ống về bên trái
        pipe.x -= 3; //NOTE: số phải phù hợp để con xchim + chim.w = p.x (Hkhung - (Xchim + Ưchim) % x == 0) 
    }

    bird.y += 3;
    requestAnimationFrame(run);
}

//==================================================================================================================
//NHẤN PHÍM
document.addEventListener("keydown", function() {
    bird.y -= 70;
});

gameStart();

//run();