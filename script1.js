window.onload = function() {
  var page = 1;
  var limit = 2; // Установите это значение в соответствии с лимитом на сервере

  function loadReviews() {
    var xhr = new XMLHttpRequest();

    xhr.onload = function() {
      if (xhr.status === 200) {
        // Проверяем, закончились ли отзывы
        if (xhr.responseText == "NO_REVIEWS") {
          document.getElementById("load-more").style.display = "none";
          return;
        }

        var reviews = JSON.parse(xhr.responseText);
        var container = document.getElementById("reviews");
        var output = "";

        for (var i = 0; i < reviews.length; i++) {
          output += "<div class='columns'>";
          output += "<div class='column all-news'>";
          output += "<h2 class='title'>" +"<a href='post.php?id=" + reviews[i].postID + "'>" + reviews[i].postTitle + "</a>";
          output += "</h2><i class='date'>" + reviews[i].userName + " | " + reviews[i].postDate + "</i><br>";
          output += "<p class='comment'>" + reviews[i].postComment + "</p>";
          output += "</div>";
          output += "</div>";
          output += "<hr>";
        }

        container.innerHTML += output;

        // Проверяем, есть ли ещё отзывы
        if (reviews.length < limit) {
          document.getElementById("load-more").style.display = "none";
        } else {
          page++;
        }
      }
    };

    xhr.open("GET", "getreviews.php?page=" + page, true);
    xhr.send();
  }

  loadReviews();

  document.getElementById("load-more").addEventListener("click", function() {
    if (document.getElementById("load-more").style.display != "none") {
      loadReviews();
    }
  });
};
