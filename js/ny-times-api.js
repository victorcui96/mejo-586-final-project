var nyTimesArticleSearch = function(searchQuery) {
    var url = "https://api.nytimes.com/svc/search/v2/articlesearch.json";
    url += '?' + $.param({
        'api-key': "e978d8f62e414c23b5fe0d7053bea846",
        'q': searchQuery,
        'sort': "newest"
    });
    // get NY-Times Article search
    $.ajax({
        url: url,
        method: 'GET',
    }).done(function(result) {
        var articles = result.response.docs;
        var html = "";
        $.each(articles, function(i, data) {

            html += '<div class="one-article">';
            html += '<h3 class="headline">' + '<a href="' + data.web_url + '">' + data.headline.main;
            html += '</a>';
            html += '</h3>';
            html += '<div class="author-and-date">';
            var exactDate = new Date(data.pub_date);
            var formattedDate = moment().format("dddd MMMM Do, YYYY");
            if (data.byline) {
                html += '<span>' + data.byline.original + '     |    ' + '</span>' + '<span>' + 'Type: ' + data.section_name + '     |     ' + '</span>' + '<span>' + formattedDate + '</span>';
            }
            html += '<p class="gentium">' + data.snippet + '</p>';
            html += '</div>';
            html += '</div>';
        });
        $articlesContainer = $('.articles-container');
        $articlesContainer.append(html);
    }).fail(function(err) {
        throw err;
    });
};

nyTimesArticleSearch('obamacare');

// var nyTimesTopStories = function() {
//     // get NY-Times Top Stores API
//     var url = "https://api.nytimes.com/svc/topstories/v2/politics.json";
//     url += '?' + $.param({
//         'api-key': "e978d8f62e414c23b5fe0d7053bea846"
//     });
//     $.ajax({
//         url: url,
//         method: 'GET',
//     }).done(function(result) {
//         console.log(result);
//     }).fail(function(err) {
//         throw err;
//     });

// };

// nyTimesTopStories();
