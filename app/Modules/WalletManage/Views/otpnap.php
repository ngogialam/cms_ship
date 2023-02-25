<?=view('layout/bannerEwallet')?>

    <!-- ===============BODY============== -->
    <div class="ew-xn">
        <div class="ew-rd-tt" style="width: 90%;">
            <span><?php echo $title?></span>
            <div class="ew-otp-bd">
                <ul>
                    <li>
                        <span>Nhập mã OTP</span><br> 
                        được gửi đến số 0977177380
                    </li>
                    <li>
                        <input type="text" id="otp" placeholder="Nhập mã OTP" style="width: 30%;"  onchange="myFunctionEX()" maxlength="8">
                    </li>
                    <li>
                        Gửi lai mã OTP sau<br>
                        <span id="timer"> 120s</span>
                    </li>

                  
                </ul>
                <ul>
                    <li class="ew-otp-btn" >
                        <button onclick="myFunction()">Gửi lại mã OTP</button>
                        <button style="display: none;" id="done">Hoàn thành</button>
                    </li>
                    <script>
                        var count=120;
                        var counter=setInterval(timer, 1000); 
                        
                        function myFunction(){
                            count=121;
                            
                        }
                      
                        function myFunctionEX() {
                            var x = document.getElementById("otp").value;
                            if(x.length<8){
                                alert ("Số lượng ký tự mã OTP không đủ !!!")
                            }
                            else if(isNaN(x)){
                                alert ("OTP nhập vào phải là dạng số !!!")
                            }
                            else
                                alert ("OK cho qua");
                            
                        }

                        function timer()
                        {
                            count=count-1;
                            if (count < 0){
                                count = 0;
                            }else if(count==0){
                                
                            }
                            document.getElementById("timer").innerHTML=count + "s"; 
                        }
                       
                    </script>
                </ul>
            </div>
        </div> 
    </div>              

<section>



