window.onload =function(){

//��ȡ�ϴ���ť
    var input1 = document.getElementById("upload");

    if(typeof FileReader==='undefined'){
        //result.innerHTML = "��Ǹ������������֧�� FileReader";
        input1.setAttribute('disabled','disabled');
    }else{
        input1.addEventListener('change',readFile,false);
        input1.addEventListener('change',function (e){
         console.log(this.files);//�ϴ����ļ��б�
         },false);
    }
    function readFile(){
        var file = this.files[0];//��ȡ�ϴ��ļ��б��е�һ���ļ�
        if(!/image\/\w+/.test(file.type)){
            //ͼƬ�ļ���typeֵΪimage/png��image/jpg
            alert("�ļ�����ΪͼƬ��");
            return false;
        }
        // console.log(file);
        var reader = new FileReader();//ʵ��һ���ļ�����
        reader.readAsDataURL(file);//���ϴ����ļ�ת����url
        //���ļ���ȡ�ɹ�����Ե�ȡ�ϴ��Ľӿ�
        reader.onload = function(e){
            // console.log(this.result);//�ļ�·��
            // console.log(e.target.result);//�ļ�·��
            var data = e.target.result.split(',');
             var tp = (file.type == 'image/png')? 'png': 'jpg';
             var imgUrl = data[1];//ͼƬ��url��ȥ��(data:image/png;base64,)
             //��Ҫ�ϴ�������������������Խ���ajax����
             console.log(imgUrl);
             // ����һ�� Image ����
             var image = new Image();
             // ����һ�� Image ����
             image.src = imgUrl;
             image.src = e.target.result;
             image.onload = function(){
             document.body.appendChild(image);
             }

            var image = new Image();
            // ����src����
            image.src = e.target.result;
            var max=200;
            // ��load�¼���������������ɺ�ִ�У�����ͬ������
            image.onload = function(){
                // ��ȡ canvas DOM ����
                var canvas = document.getElementById("cvs");
                // ����߶ȳ��� ��ȵȱ������� *=
                if(image.height > max) {
                 image.width *= max / image.height;
                 image.height = max;
                 }
                // ��ȡ canvas�� 2d ��������,
                var ctx = canvas.getContext("2d");
                // canvas����
                ctx.clearRect(0, 0, canvas.width, canvas.height);
                // ����canvas���
                /*canvas.width = image.width;
                 canvas.height = image.height;
                 if (canvas.width>max) {canvas.width = max;}*/
                // ��ͼ����Ƶ�canvas��
                // ctx.drawImage(image, 0, 0, image.width, image.height);
                ctx.drawImage(image, 0, 0, 200, 200);
                // ע�⣬��ʱimageû�м��뵽dom֮��
            };
        }
    };

    $(function(){
        $("#yincag").click(function(){
            $("#qiygw").hide()
        });
        $("#yincag1").click(function(){
            $("#qiygw").show()
        });
        $("#yincag2").click(function(){
            $("#qiygw").show()
            $(".qiygw2").hide()
            $(".qiygw3").show()
        });


        $("#fold-button").click(function(){
            $(".fold-box").slideToggle("slow");
            $("#Wu-Bot1").slideToggle("slow");
            $("#open").toggle();
            $("#close").toggle();
        });
        $("#dakais").click(function(){
            $(".fold-box").slideToggle("slow");
            $("#Wu-Bot").slideToggle("slow");
            $("#dakai").toggle();
            $("#dakai1").toggle();
        });
        $("#fold-button1").click(function(){
            $(".fold-box").slideToggle("slow");
            $("#Wu-Bot1").slideToggle("slow");
            $("#opoen").toggle();
            $("#cloose").toggle();
        });


        $("#Wu-ji").click(function(){
            $(".Wu-set1").show().siblings(".Wu-set2").hide()
            $(".Wu-set1").show().siblings(".Wu-set3").hide()
            $(".Wu-set1").show().siblings(".Wu-set4").hide()
            $("#Wu-ji").css({"background":"#3896dc","color":"#fff"}).siblings().css({"background":"#fff","color":"#585858"})
        })
        $("#Wu-bao").click(function(){
            $(".Wu-set2").show().siblings(".Wu-set1").hide()
            $(".Wu-set2").show().siblings(".Wu-set3").hide()
            $(".Wu-set2").show().siblings(".Wu-set4").hide()
            $("#Wu-bao").css({"background":"#3896dc","color":"#fff"}).siblings().css({"background":"#fff","color":"#585858"})
        })
        $("#Wu-tou").click(function(){
            $(".Wu-set3").show().siblings(".Wu-set1").hide()
            $(".Wu-set3").show().siblings(".Wu-set2").hide()
            $(".Wu-set3").show().siblings(".Wu-set4").hide()
            $("#Wu-tou").css({"background":"#3896dc","color":"#fff"}).siblings().css({"background":"#fff","color":"#585858"})
        })
        $("#Wu-gao").click(function(){
            $(".Wu-set4").show().siblings(".Wu-set1").hide()
            $(".Wu-set4").show().siblings(".Wu-set2").hide()
            $(".Wu-set4").show().siblings(".Wu-set3").hide()
            $("#Wu-gao").css({"background":"#3896dc","color":"#fff"}).siblings().css({"background":"#fff","color":"#585858"})
        })
        $(".Wu-in1").click(function(){
            $("Wu-twoBot").show()
        })
        $(".Wu-in2").click(function(){
            $(".Wu-twoBot").hide()
        });




    });
}