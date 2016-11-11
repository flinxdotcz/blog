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

// function resizeThumbnail(item,x,y) {
//   x = x || 1;
//   y = y || 1;
//   var smaller;
//   x > y ? smaller = x : smaller = y;
//   x = x/smaller;
//   y = y/smaller;
//   var img = $(item).find('img'),
//       elX = $(item).width(),
//       elY = $(item).width(),
//       imgX = img.width(),
//       imgY = img.height();
//   item.width(elX * x);
//   item.height(elY * y);
//   switch (true) {
//     case x > y:
//       switch (true) {
//         case imgX > imgY:
//           img.css({width: (elX * x)+'px',height: 'auto',marginTop: '-'+(imgY-elY*y)/2+'px'});
//           break;
//         case imgX == imgY:
//           img.css({width: (elX * x)+'px',height: 'auto',marginTop: '-'+(imgY-elY*y)+'px'});
//           break;
//         case imgX < imgY:
//           img.css({width: 'auto',height: (elY * y)+'px'});
//           break;
//       }
//       break;
//     case x == y:
//       switch (true) {
//         case imgX > imgY:
//           img.css({width: 'auto',height: (elY * y)+'px'});
//           break;
//         case imgX == imgY:
//           img.css({width: (elX * x)+'px',height: (elY * y)+'px'});
//           break;
//         case imgX < imgY:
//           img.css({width: (elX * x)+'px',height: 'auto'});
//           break;
//       }
//       break;
//     case x < y:
//       switch (true) {
//         case imgX > imgY:
//           img.css({width: 'auto',height: (elY * y)+'px'});
//           break;
//         case imgX == imgY:
//           img.css({width: (elX * x)+'px',height: 'auto'});
//           break;
//         case imgX < imgY:
//           img.css({width: (elX * x)+'px',height: 'auto'});
//           break;
//       }
//       break;
//   }
// }
