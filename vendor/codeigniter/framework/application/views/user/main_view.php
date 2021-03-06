<body>

  <nav class="nav-extended">
    <div class="nav-wrapper">
      <a href="./index.html" class="brand-logo"><?= APP_TITLE ?></a>
      <a href="#" data-activates="mobile-demo" class="button-collapse"><i class="material-icons">menu</i></a>
      <ul id="nav-mobile" class="right hide-on-med-and-down">
        <li><a href="/user/login">로그인(-)</a></li>
        <li><a href="/user/register">가입(-)</a></li>
        <li><a href="/user/read">열람(M)</a></li>
        <li><a href="/user/debate">토론(M)</a></li>
        <li><a href="/user/board">게시판(M)</a></li>
        <li><a href="/user/history">히스토리(M)</a></li>
        <li><a href="/user/account">계정관리(M)</a></li>
        <li><a href="/user/account">로그아웃(M)</a></li>
      </ul>
      <ul class="side-nav" id="mobile-demo">
        <li><a href="../pages/account/signin.html">로그인(-)</a></li>
        <li><a href="../pages/account/signup.html">가입(-)</a></li>
        <li><a href="../pages/activity/read.html">열람(M)</a></li>
        <li><a href="../pages/activity/debate.html">토론(M)</a></li>
        <li><a href="../pages/activity/board.html">게시판(M)</a></li>
        <li><a href="../pages/activity/history.html">히스토리(M)</a></li>
        <li><a href="../pages/account/account.html">계정관리(M)</a></li>
        <li><a href="../pages/account/signout.html">로그아웃(M)</a></li>
      </ul>
    </div>
  </nav>
  <nav>
    <div class="nav-wrapper">
      <form>
        <div class="input-field">
          <input id="search" type="search" required>
          <label class="label-icon" for="search"><i class="material-icons">검색</i></label>
          <i class="material-icons">close</i>
        </div>
      </form>
    </div>
  </nav>

  검색을 할 때 단어별 헌법나열을 통해 Autocomplete를 활용하는것도 고려


  서버개발 인덱스 암호화   - AES256    키는 복잡하게
  비밀번호는 sha512

일단은 서브관리자는 따로 설정하지않고 최고관리자가 다 한다.


  서버프로그래밍할때  인덱스에 맞는 데이터가 존재하는지 체크하고 ,  폼데이터가 왔는지 체크,  그리고 각각 체크후에 서버통신
  <div class="container">
    <div class="section">

      <!--   Icon Section   -->
      <div class="row">

        <div class="col s12 m12 l9">
            <i class="small material-icons">mode_edit</i>
            <br>
            최근 수정 시각: 2017-04-25 01:28:47+0900
            <h5>
              App Title
            </h5>


      <div class="row">
        <div class="col s12">
          <div class="card">
            <div class="card-content">
              <span class="card-title">Card Title</span>
              <p>I am a very simple card. I am good at containing small bits of information.
              I am convenient because I require little markup to use effectively.</p>
            </div>
            <div class="card-action">
              <a href="#">This is a link</a>
              <a href="#">This is a link</a>
            </div>
          </div>
        </div>
        <div class="col s12">
          <div class="card">
            <div class="card-content">
              <span class="card-title">Card Title</span>
              <p>I am a very simple card. I am good at containing small bits of information.
              I am convenient because I require little markup to use effectively.</p>
            </div>
            <div class="card-action">
              <a href="#">This is a link</a>
              <a href="#">This is a link</a>
            </div>
          </div>
        </div>
        <div class="col s12 m6">
          <div class="card">
            <div class="card-content">
              <span class="card-title">Card Title</span>
              <p>I am a very simple card. I am good at containing small bits of information.
              I am convenient because I require little markup to use effectively.</p>
            </div>
            <div class="card-action">
              <a href="#">This is a link</a>
              <a href="#">This is a link</a>
            </div>
          </div>
        </div>
        <div class="col s12 m6">
          <div class="card">
            <div class="card-content">
              <span class="card-title">Card Title</span>
              <p>I am a very simple card. I am good at containing small bits of information.
              I am convenient because I require little markup to use effectively.</p>
            </div>
            <div class="card-action">
              <a href="#">This is a link</a>
              <a href="#">This is a link</a>
            </div>
          </div>
        </div>
        <div class="col s12 m6">
          <div class="card">
            <div class="card-content">
              <span class="card-title">Card Title</span>
              <p>I am a very simple card. I am good at containing small bits of information.
              I am convenient because I require little markup to use effectively.</p>
            </div>
            <div class="card-action">
              <a href="#">This is a link</a>
              <a href="#">This is a link</a>
            </div>
          </div>
        </div>
        <div class="col s12 m6">
          <div class="card">
            <div class="card-content">
              <span class="card-title">Card Title</span>
              <p>I am a very simple card. I am good at containing small bits of information.
              I am convenient because I require little markup to use effectively.</p>
            </div>
            <div class="card-action">
              <a href="#">This is a link</a>
              <a href="#">This is a link</a>
            </div>
          </div>
        </div>
        <div class="col s12">
          <div class="card">
            <div class="card-content">
              <span class="card-title">Card Title</span>
              <p>I am a very simple card. I am good at containing small bits of information.
              I am convenient because I require little markup to use effectively.</p>
            </div>
            <div class="card-action">
              <a href="#">This is a link</a>
              <a href="#">This is a link</a>
            </div>
          </div>
        </div>
      </div>



        </div>
        <div class="col l3 hide-on-med-and-down">
          <h5>Info</h5>

          <div class="row">
            <div class="col s12">
              <div class="card">
                <div class="card-content">
                  <ul class="collection">
                    <li class="collection-header"><h4>Lists</h4></li>
                    <li class="collection-item"><div>Alvin<a href="#!" class="secondary-content"><i class="material-icons">send</i></a></div></li>
                    <li class="collection-item"><div>Alvin<a href="#!" class="secondary-content"><i class="material-icons">send</i></a></div></li>
                    <li class="collection-item"><div>Alvin<a href="#!" class="secondary-content"><i class="material-icons">send</i></a></div></li>
                    <li class="collection-item"><div>Alvin<a href="#!" class="secondary-content"><i class="material-icons">send</i></a></div></li>
                    <li class="collection-item"><div>Alvin<a href="#!" class="secondary-content"><i class="material-icons">send</i></a></div></li>
                    <li class="collection-item"><div>Alvin<a href="#!" class="secondary-content"><i class="material-icons">send</i></a></div></li>
                    <li class="collection-item"><div>Alvin<a href="#!" class="secondary-content"><i class="material-icons">send</i></a></div></li>
                    <li class="collection-item"><div>Alvin<a href="#!" class="secondary-content"><i class="material-icons">send</i></a></div></li>
                    <li class="collection-item"><div>Alvin<a href="#!" class="secondary-content"><i class="material-icons">send</i></a></div></li>
                    <li class="collection-item"><div>Alvin<a href="#!" class="secondary-content"><i class="material-icons">send</i></a></div></li>
                    <li class="collection-item"><div>Alvin<a href="#!" class="secondary-content"><i class="material-icons">send</i></a></div></li>
                    <li class="collection-item"><div>Alvin<a href="#!" class="secondary-content"><i class="material-icons">send</i></a></div></li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col s12">
              <div class="card">
                <div class="card-content">
                  <ul class="collection">
                    <li class="collection-header"><h4>Lists</h4></li>
                    <li class="collection-item"><div>Alvin<a href="#!" class="secondary-content"><i class="material-icons">send</i></a></div></li>
                    <li class="collection-item"><div>Alvin<a href="#!" class="secondary-content"><i class="material-icons">send</i></a></div></li>
                    <li class="collection-item"><div>Alvin<a href="#!" class="secondary-content"><i class="material-icons">send</i></a></div></li>
                    <li class="collection-item"><div>Alvin<a href="#!" class="secondary-content"><i class="material-icons">send</i></a></div></li>
                    <li class="collection-item"><div>Alvin<a href="#!" class="secondary-content"><i class="material-icons">send</i></a></div></li>
                    <li class="collection-item"><div>Alvin<a href="#!" class="secondary-content"><i class="material-icons">send</i></a></div></li>
                    <li class="collection-item"><div>Alvin<a href="#!" class="secondary-content"><i class="material-icons">send</i></a></div></li>
                    <li class="collection-item"><div>Alvin<a href="#!" class="secondary-content"><i class="material-icons">send</i></a></div></li>
                    <li class="collection-item"><div>Alvin<a href="#!" class="secondary-content"><i class="material-icons">send</i></a></div></li>
                    <li class="collection-item"><div>Alvin<a href="#!" class="secondary-content"><i class="material-icons">send</i></a></div></li>
                    <li class="collection-item"><div>Alvin<a href="#!" class="secondary-content"><i class="material-icons">send</i></a></div></li>
                    <li class="collection-item"><div>Alvin<a href="#!" class="secondary-content"><i class="material-icons">send</i></a></div></li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

    </div>
  </div>

  <footer class="page-footer orange">
    <div class="container">
      <div class="row">
        <div class="col l6 s12">
          <h5 class="white-text">Company Bio</h5>
          <p class="grey-text text-lighten-4">We are a team of.......</p>


        </div>
        <div class="col l3 s12">
          <h5 class="white-text">Settings</h5>
          <ul>
            <li><a class="white-text" href="#!">Link 1</a></li>
          </ul>
        </div>
        <div class="col l3 s12">
          <h5 class="white-text">Connect</h5>
          <ul>
            <li><a class="white-text" href="#!">Link 1</a></li>
          </ul>
        </div>
      </div>
    </div>
    <div class="footer-copyright">
      <div class="container">
      Made by <a class="orange-text text-lighten-3" href="http://materializecss.com">Materialize</a>
      </div>
    </div>
  </footer>


  <!--  Scripts-->
  <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.98.2/js/materialize.min.js"></script>
  <script>
    $(".button-collapse").sideNav();

    $('input#search').autocomplete({
      data: {
        "Apple": null,
        "Microsoft": null,
        "Google": 'http://placehold.it/250x250'
      },
      limit: 20, // The max amount of results that can be shown at once. Default: Infinity.
      onAutocomplete: function(val) {
        // Callback function when value is autcompleted.
      },
      minLength: 1, // The minimum length of the input for the autocomplete to start. Default: 1.
    });
  </script>
  </body>
