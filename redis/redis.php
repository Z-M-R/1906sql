<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>在线选座</title>
</head>
<body>

<?php
    $redis = new Redis();
    $redis->connect('192.168.93.1');
    $redis->auth('123456abc');


    $total = 100;



    for($i=1;$i<=$total;$i++)
    {

        echo " <button class='seat'>{$i}</button> ";
        if($i%10 ==0){
            echo "<br>";
        }
    }

    ?>


<script>
    var seats = document.getElementsByClassName("seat");
    //console.log(seats);

    for(var i=0;i<seats.length;i++)
    {
        seats[i].style.backgroundColor = 'palegreen';        //默认颜色
        seats[i].addEventListener('click',function(e){

            var ys = confirm("确定要这个座位吗？" + this.innerHTML)
            console.log(ys);
            if(ys){
                //发送ajax请求后端 选中此座位
                this.style.backgroundColor = 'blue';     //选中后座位变红色
                var xhr = new XMLHttpRequest();

                var seat_id = this.innerHTML;
                xhr.open('GET', '/seats.php?id='+seat_id, true);
                xhr.send();

                xhr.onreadystatechange = function(){
                    if (xhr.readyState === XMLHttpRequest.DONE) {
                        // Everything is good, the response was received.
                        if (xhr.status === 200) {
                            // Perfect!
                            alert(xhr.responseText);

                        } else {
                            // There was a problem with the request.
                            // For example, the response may have a 404 (Not Found)
                            // or 500 (Internal Server Error) response code.
                        }

                    } else {
                        // Not ready yet.
                    }
                }


            }
        });
    }

</script>
</body>
</html>




