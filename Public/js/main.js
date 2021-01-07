document.getElementById('btn').addEventListener('click', function(){
    if( document.getElementById('navbarsExampleDefault').style.display == "block")
      document.getElementById('navbarsExampleDefault').style.display = "none";
    else
      document.getElementById('navbarsExampleDefault').style.display = "block";
    });

    function like(event)
    {
      if( !event ) event = window.event;
      var postid = (event.target && event.target.getAttribute('data-post_id'));
      var userid = (event.target && event.target.getAttribute('data-user_id'));
      var like_nbr = (event.target && event.target.getAttribute('data-like_nbr'));
      var li = document.getElementById('l_'+postid);
      var c = li.getAttribute('class');
      var li_nb = document.getElementById('li_nb_'+postid);
      var sym = 0;
      if (userid == "") {
        window.location.replace("http://localhost/camagru/users/login");
        return ;
      }
      var xhttp = new XMLHttpRequest();
      //xhttp.open('POST', 'http://192.168.99.101:8083/posts/Like');
      xhttp.open('POST', 'http://localhost/camagru/posts/like');
      xhttp.withCredentials = true;
      if (event.target.className == "fa fa-heart-o")
      {
          event.target.className = "fa fa-heart";
          like_nbr++;
          li_nb.innerHTML = like_nbr;
          event.target.setAttribute('data-like_nbr', like_nbr);
          
      }
      else if (event.target.className == "fa fa-heart")
      {
          event.target.className = "fa fa-heart-o";
          if(like_nbr <= 0)
                sym = 1;
          like_nbr--;
          event.target.setAttribute('data-like_nbr', like_nbr);
          li_nb.innerHTML = like_nbr + sym;
    
      }
      var params = "post_id=" + postid + "&user_id=" + userid + "&c=" + c + "&like_nbr=" + like_nbr;
      xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
      xhttp.send(params);
    }

    function comment(event)
    {
        if( !event ) event = window.event;
        var postid = (event.target && event.target.getAttribute('data-c-post_id'));
        var userid = (event.target && event.target.getAttribute('data-c-user_id'));
        var co = document.getElementsByName('comment_'+postid);
        var com = co[0].value;

        if(com.trim() == "" && userid != ""){
            co[0].placeholder = 'Please enter valid comment';
            return ;
        }
        if (userid == "") {
          window.location.replace("http://localhost/camagru/users/login");
          return;
        }
        var xhttp = new XMLHttpRequest();
        var params = "c_post_id=" + postid + "&c_user_id=" + userid + "&content=" + com;
        xhttp.open('POST', 'http://localhost/camagru/Posts/comment');
        xhttp.withCredentials = true;
        xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhttp.send(params);
        setInterval(function(){ window.location.reload(); }, 50);
    }