$(document).ready(function() {
  var baseUrl             = $('meta[name="_root"]').attr('content'),
      win                 = $(window),
      header              = $('.page-header'),
      headerContent       = $('.page-header-content'),
      thumbnail           = $('.page-header-thumbnail'),
      avatar              = $('.page-header .avatar'),
      articleBlock        = $('.article-block'),
      scrollSpeed         = 0.75;

  $('#sidebar').length ? feedSidebar(baseUrl+'/feed') : '';

  $('.home-content').length && equalHeight(articleBlock);

  headerContent.fadeIn(1000);
  thumbnail.fadeIn(1000);
  avatar.fadeIn(1000);

  avatar.css('bottom',(header.height() - avatar.height())/2+'px');
  headerContent.css('bottom',(header.height() - headerContent.height())/2+'px');
  thumbnail.css({
    'margin-top': '-'+(thumbnail.height() - header.height())/2+'px',
    'margin-bottom': '-'+(thumbnail.height() - header.height())/2+'px'
  });

  win.on('resize load', function() {
    avatar.css('bottom',(header.height() - avatar.height())/2+'px');
    headerContent.css('bottom',(header.height() - headerContent.height())/2+'px');
    thumbnail.css({
      'margin-top': '-'+(thumbnail.height() - header.height())/2+'px',
      'margin-bottom': '-'+(thumbnail.height() - header.height())/2+'px'
    });
  });

  win.on('scroll', function() {
    if (win.scrollTop() <= header.height()) {
      headerContent.css({
        'transform': 'translate3d(0px,'+(win.scrollTop()*scrollSpeed*0.75)+'px,0px)'
      });
      avatar.css({
        'transform': 'translate3d(0px,'+(win.scrollTop()*scrollSpeed*0.75)+'px,0px)'
      });
      thumbnail.css({
        'transform': 'translate3d(0px,'+(win.scrollTop()*scrollSpeed)+'px,0px)'
      });
    } else {
      headerContent.css('transform','initial');
      avatar.css('transform','initial');
      thumbnail.css('transform','initial');
    }
  });
});
function feedSidebar(url) {
  $.ajax({
    type:'POST',
    url: url,
    data: {
      _token: $('meta[name="_token"]').attr('content')
    },
    error: function(req, e) {
      console.log(e+':');
      console.log(arguments);
    },
    success: function(data){
     $('#sidebar .sidebar-title').addClass('data-fetched');
     $.each(data, function(i, article){
      $('#sidebar').append("\
        <div class='article-single'>\
          <a href='"+article.url+"'>\
            <div class='article-single-thumbnail'>\
              <img src='"+article.thumbnail+"' alt='"+article.name+"'>\
            </div>\
          </a>\
          <a href='"+article.url+"'>\
            <h4 class='article-single-title'>\
              "+article.name+"\
            </h4>\
          </a>\
          <p class='article-single-excerpt'>\
            "+article.excerpt+"\
          </p>\
          <p class='article-single-meta'>\
          </p>\
        </div>\
      ");
     });
    }
  });
}

function equalHeight(el) {
  var biggest = null;
  el.each(function(i, block) {
    if ($(block).height() > biggest) {
      biggest = $(block).height()
    }
  });
  $(el).height(biggest);
}
