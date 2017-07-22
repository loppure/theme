import jQuery from 'jquery';

const filters = {
  instagram: function(raw_data) {
    var filtered_data;
    filtered_data = [];
    jQuery.each(raw_data, function(index, foreign_post) {
      return filtered_data.push({
        author: {
          name: foreign_post.caption.from.full_name,
          username: foreign_post.caption.from.username,
          picture: foreign_post.caption.from.profile_picture
        },
        caption: foreign_post.caption.text,
        url_low: foreign_post.images.low_resolution.url,
        url_full: foreign_post.images.standard_resolution.url,
        time: foreign_post.created_time,
        link: foreign_post.link,
        likes: foreign_post.likes.count
      });
    });
    return filtered_data;
  },
  twitter: function(raw_data) {
    var filtered_data;
    filtered_data = [];
    return jQuery.each(raw_data, function(index, foreign_post) {
      return filtered_data.push({
        author: {
          name: foreign_post.user.name,
          username: foreign_post.user.screen_name,
          picture: foreign_post.user.profile_image_url
        },
        caption: foreign_post.text,
        link: 'https://twitter.com/' + foreign_post.user.screen_name + '/status/' + foreign_post.id_str,
        likes: foreign_post.favorite_count,
        time: parseInt((new Date(foreign_post.created_at)).getTime() / 1000),
        url_full: foreign_post.entities.media != null ? foreign_post.entities.media[0].media_url : false
      });
    });
  },
  comments: function(raw_data) {
      console.log('raw: ', raw_data)
    var j, k, len, len1, n, nested, nn, not_nested;
    not_nested = raw_data.filter(function(c) {
      return c.comment_parent === "0";
    });
    nested = raw_data.filter(function(c) {
      return c.comment_parent !== "0";
    });
    for (j = 0, len = nested.length; j < len; j++) {
      n = nested[j];
      for (k = 0, len1 = not_nested.length; k < len1; k++) {
        nn = not_nested[k];
        if (n.comment_parent === nn.comment_ID) {
          if (nn.sons == null) {
            nn.sons = [];
          }
          nn.sons.push(n);
        }
      }
    }
    return not_nested.reverse();
  }
}

export default filters;
