<!-- Facebook sdk call -->
<script>
(function(d, s, id) {
 var js, fjs = d.getElementsByTagName(s)[0];
 if (d.getElementById(id)) return;
 js = d.createElement(s); js.id = id;
 js.src = "//connect.facebook.net/ko_KR/sdk.js#xfbml=1&version=v2.9&appId=1810592205924891";
 fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>

<!-- 페이스북 로그인 Script -->
<script>
function checkLoginState() {
  FB.getLoginStatus(function(response) {
    statusChangeCallback(response);
  });
}

function logout(){
  FB.logout(function(response) {
   // Person is now logged out
   console.log(response);
   document.getElementById('status').innerHTML = "Logged out";
 });
}

// 페이스북 로그인 콜백함수
function statusChangeCallback(response) {
  console.log('statusChangeCallback');
  console.log(response);
  if (response.status === 'connected') { // 페이스북을 통해서 로그인이 되어있다.
    console.log("Token : "+response.authResponse.accessToken);
    FB.api('/me', function(response){
        location.href = "/admin/join/response?app_id="+response.id+"&name="+response.name+"&sns=fb";
    });

  } else if (response.status === 'not_authorized') { // 페이스북에는 로그인 했으나, 앱에는 로그인이 되어있지 않다.
    document.getElementById('status').innerHTML = 'Please log ' + 'into this app.';
  } else { // 페이스북에 로그인이 되어있지 않다. 따라서, 앱에 로그인이 되어있는지 여부가 불확실하다.
    document.getElementById('status').innerHTML = 'Please log ' + 'into Facebook.';
  }
}

</script>
<script src="//developers.kakao.com/sdk/js/kakao.min.js"></script>
<!-- <script type="text/javascript">
      (function() {
       var po = document.createElement('script'); po.type = 'text/javascript'; po.async = true;
       po.src = 'https://apis.google.com/js/client.js?onload=onLoadCallback';
       var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(po, s);
     })();
</script> -->



   <main>
       <div class="container">
           <div class="row">

               <div class="col s12">
                 <br>
                 <hr>
                 <br>
                <div id="fb-root"></div>
                <fb:login-button scope="public_profile,email" onlogin="checkLoginState();" size="xlarge"> </fb:login-button> <div id="status"> </div>



                <br><hr><br>
                <!-- 카카오 로그인. 스크립트가 위로가면 인식 X -->
                <a id="kakao-login-btn"></a>
                <script type='text/javascript'>
                  //<![CDATA[
                    // 사용할 앱의 JavaScript 키를 설정해 주세요.
                    Kakao.init('638743f87f712f51dc1a843aea360e0d');
                    // 카카오 로그인 버튼을 생성합니다.
                    Kakao.Auth.createLoginButton({
                      container: '#kakao-login-btn',
                      success: function(authObj) {
                        alert(JSON.stringify(authObj));
                        // alert("Access Token : " + authObj.access_token);
                        Kakao.API.request({
                          url: "/v1/user/me",
                          success: function(suc){

                            // alert("ID : "+suc.id + "\nEmail : " + suc.kaccount_email);
                            location.href = "/admin/join/response?app_id="+suc.id+"&name="+suc.kaccount_email+"&sns=kakao";
                          },
                          fail: function(err){
                            alert("TEST");
                            alert(JSON.stringify(err));
                          }
                        });
                      },
                      fail: function(err) {
                         alert(JSON.stringify(err));
                      }
                    });
                  //]]>

                </script>
                <br><hr><br>
                <!-- 구글에 로그인 되어있을 경우 data-onsuccess로 자동 이동-->
                  <div class="g-signin2"
                    data-scope="https://www.googleapis.com/auth/plus.login"
                    data-clientid="900317406119-cc7urgf44dhko94kfa51c6a6vje5eb8g"
                    data-accesstype="offline"
                    data-onsuccess="onSignIn"
                    data-onfailure="onSignInFailure">
                  </div>
                    <script>

                      function onSignIn(googleUser) {
                        location.href = "/admin/join/response?app_id="+googleUser.El+"&name="+googleUser.getBasicProfile().getName()+"&sns=google";
                      }
                      function onSignInFailure(error) {
                        console.log(error);
                      }

                    </script>

                    <script src="https://apis.google.com/js/platform.js?onload=renderButton" async defer></script>
           </div>
       </div>

   </main>



   <!--  Scripts-->
   <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.98.2/js/materialize.min.js"></script>
   <script>
       $(".button-collapse").sideNav();
   </script>
