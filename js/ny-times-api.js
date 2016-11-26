var nyTimesArticleSearch = function() {
    var url = "https://api.nytimes.com/svc/search/v2/articlesearch.json";
    url += '?' + $.param({
        'api-key': "e978d8f62e414c23b5fe0d7053bea846",
        'q': "obamacare"
    });
    // get NY-Times Article search
    $.ajax({
        url: url,
        method: 'GET',
    }).done(function(result) {
        console.log(result);
        var articles = result.response.docs;
        var html = "";
        $.each(articles, function(i, data) {
            console.log(data.headline.main);
            html += '<div class="one-article">';
            html += '<h4>' + '<a href="' + data.web_url + '">' + data.headline.main;
            html += '</a>';
            html += '</h4>';
            html += '</div>';
        });
        $articlesContainer = $('.articles-container');
        $articlesContainer.append(html);
    }).fail(function(err) {
        throw err;
    });
};

nyTimesArticleSearch();

var nyTimesTopStories = function() {
    // get NY-Times Top Stores API
    var url = "https://api.nytimes.com/svc/topstories/v2/politics.json";
    url += '?' + $.param({
        'api-key': "e978d8f62e414c23b5fe0d7053bea846"
    });
    $.ajax({
        url: url,
        method: 'GET',
    }).done(function(result) {
        console.log(result);
    }).fail(function(err) {
        throw err;
    });

};

nyTimesTopStories();
