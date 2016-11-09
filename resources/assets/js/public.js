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

  $('.home-content').length ? equalHeight(articleBlock) : '';
  articleBlock.length ? resizeThumbnail($('.article-block-thumbnail'),21,9) : '';

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
          <p class='article-single-meta'>\
          "+article.created_at+"\
          </p>\
        </div>\
      ");
     });
     resizeThumbnail($('.article-single-thumbnail'));
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

function resizeThumbnail(el,x,y) {
  el.each(function(index, item) {
    x = x || 1;
    y = y || 1;
    var smaller;
    x > y ? smaller = x : smaller = y;
    x = x/smaller;
    y = y/smaller;
    var elWidth = el.width() * x,
        elHeight = el.width() * y,
        img = $(item).find('img'),
        imgX = img.width(),
        imgY = img.height();
    el.width(elWidth);
    el.height(elHeight);
    console.log(imgX+' '+imgY);
    if (imgX >= elWidth && imgY < elHeight) {
      img.css({
        'height': '100%',
        'width': 'auto',
        'margin-left': '-'+imgX/2+'px'
      });
    } else if (imgX <= elWidth && imgY > elHeight) {
      img.css({
        'height': 'auto',
        'width': '100%',
        'margin-top': '-'+imgX/2+'px'
      });
    } else {
      img.css({
        'height': '100%',
        'width': '100%'
      });
    }
  });
}
