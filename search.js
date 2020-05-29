//console.log('Hi');
//API key to access the TMDb database
var api_key = YOUR_API_KEY;
let baseurl = '';
var url_config = "https://api.themoviedb.org/3/configuration?api_key="+api_key;


//fetching the base url
fetch(url_config)
.then((resp) => resp.json()) // Transform the data into json
.then(function(data) {
    baseurl = data.images.base_url;
    console.log(baseurl);
});


document.getElementById("search").onclick = function() {

    var api_key = YOUR_API_KEY;
    var query_string = $("#searchquery").val();
    if (query_string.length == 0) {
        $("#show").html("<div class='alert alert-danger'>Please enter some words.</div>")
    }
    
    else {

        query_string = encodeURI(query_string);
    var url_search = "https://api.themoviedb.org/3/search/movie?api_key="+api_key+"&language=en-US&query="+query_string+"&page=1&include_adult=true";
    fetch(url_search)
    .then((resp) => resp.json()) // Transform the data into json
    .then(function(data) {
    // Create and append the li's to the ul
        if(data.results.length != 0) {
            
            //const obj = JSON.parse(data);
            //creating lists with the data object
            var value = "";
            for (var i = 0; i < data.results.length; i++)
            {
                var title = '';
                var release = data.results[i].release_date;
                var vote = '';
                if(!data.results[i].hasOwnProperty('title') || data.results[i].title.length == 0)
                {
                    title = 'NIL';
                }
                else {
                    title = data.results[i].title;
                }

                if(!data.results[i].hasOwnProperty('release_date') || release.length == 0)
                {
                    release = 'NIL';
                }
                else {
                release = release.substring(0,4);
                }
                if(!data.results[i].hasOwnProperty('vote_average'))
                {
                    vote = 0;
                }
                else {
                vote = data.results[i].vote_average;
                }
                //console.log(release.length);
                var overview = '';
                if (!data.results[i].hasOwnProperty('overview') || data.results[i].overview.length == 0) {
                    overview = 'No synopsis provided.';
                }
                else {
                    overview = data.results[i].overview;
                }
                var id = 0;
                if (!data.results[i].hasOwnProperty('id')) {
                    id = 0;
                }
                else {
                    id = data.results[i].id;
                }
                var base_url = '';
                if(!data.results[i].hasOwnProperty('poster_path') || data.results[i].poster_path == null)
                {
                    base_url = './noimageavailable.jpg';
                }
                else {
                    base_url = baseurl + "w500" + data.results[i].poster_path;
                }
                var img = "<img style='height:60px; width:50px;' src='"+base_url+"'></img>";
                
                value += "<div class='element'><table style='background-color: white; margin: 0px;' class='table'><tr><td style='display: none;'>"+id+"</td><td style='text-align: left;'>"+img+"</td><td style='text-align: center; vertical-align: middle;'>"+title+"</td><td style='text-align: right; vertical-align: middle;'>"+release+"</td><td style='display: none; text-align: center; vertical-align: middle;'>"+vote+"</td><td style='display: none; text-align: center; vertical-align: middle;'>"+base_url+"</td></tr></table><div style='padding: 10px; color: white;' class='extras showextra'><div style='margin-top: 15px;'><h4>SYNOPSIS<hr style='border: 1px solid white;'></h4></div><div class='overview'>"+overview+"</div>";

                value += '<div class="btn-group" role="group" style="margin: 20px auto 30px auto;" aria-label="Basic example"><button type="button" style="border: 1px solid white;" class="btn btn-warning addtofavorites">FAVORITES</button><button type="button" style="border: 1px solid white; margin-left: 5px;" class="btn btn-warning addtowatched">WATCHED</button><button type="button" style="border: 1px solid white; margin-left: 5px;" class="btn btn-warning addtobucket">BUCKET LIST</button></div>';

                value += "</div></div>";
            }
            
            $("#show").html(value);
            $('#show .element').click(function() {
                //console.log($(this)/* .find('table').find('tr').find('td:eq(o)').text() */);
                $(this).find('div.extras').toggleClass('showextra');

                var cur_id = $(this).find('table tr td:eq(0)').text();
                var cur_title = $(this).find('table tr td:eq(2)').text();
                var cur_release = $(this).find('table tr td:eq(3)').text();
                var cur_vote = $(this).find('table tr td:eq(4)').text();
                var cur_posterpath = $(this).find('table tr td:eq(5)').text();
                var cur_overview = $(this).find('.extras .overview').text();

                //ajax call to add the movie to favorites
                $(this).find('.addtofavorites').click(function() {
                    $.ajax({  
                        type: 'POST',  
                        url: './addlist.php', 
                        data: { table: 'favorites', movie_id: cur_id, title: cur_title, releaseyear: cur_release, vote: cur_vote, posterpath: cur_posterpath, overview: cur_overview },
                        success: function(response) {
                            
                            if(response == 'success')
                            {
                                $("#show").html("<div class='alert alert-success'>Successfully added to Favorites!</div>");
                            }
                            else
                            {
                                $("#show").html(response);
                                //console.log(data);
                            }
                        },
                        error: function() {
                            $("#show").html("<div class='alert alert-danger'>There was an error with the Ajax Call. Please try again later.</div>");
                        }
                    });

                });

                //ajax call to add the movie to watched
                $(this).find('.addtowatched').click(function() {
                    $.ajax({  
                        type: 'POST',  
                        url: './addlist.php', 
                        data: { table: 'watched', movie_id: cur_id, title: cur_title, releaseyear: cur_release, vote: cur_vote, posterpath: cur_posterpath, overview: cur_overview },
                        success: function(response) {
                            
                            if(response == 'success')
                            {
                                $("#show").html("<div class='alert alert-success'>Successfully added to Watched!</div>");
                            }
                            else
                            {
                                $("#show").html(response);
                                //console.log(data);
                            }
                        },
                        error: function() {
                            $("#show").html("<div class='alert alert-danger'>There was an error with the Ajax Call. Please try again later.</div>");
                        }
                    });

                });

                //ajax call to add the movie to bucket list
                $(this).find('.addtobucket').click(function() {
                    $.ajax({  
                        type: 'POST',  
                        url: './addlist.php', 
                        data: { table: 'bucketlist', movie_id: cur_id, title: cur_title, releaseyear: cur_release, vote: cur_vote, posterpath: cur_posterpath, overview: cur_overview },
                        success: function(response) {
                            
                            if(response == 'success')
                            {
                                $("#show").html("<div class='alert alert-success'>Successfully added to Bucket List!</div>");
                            }
                            else
                            {
                                $("#show").html(response);
                                //console.log(data);
                            }
                        },
                        error: function() {
                            $("#show").html("<div class='alert alert-danger'>There was an error with the Ajax Call. Please try again later.</div>");
                        }
                    });

                });

            });

        }
        else {
            $("#show").html("<div class='alert alert-danger'>No results found. Try typing some other words.</div>");
            
        }
    }).catch(err => $("#show").html("<div class='alert alert-danger'>Error connecting to the TMDb database. Please try again after sometime.</div>"));
    }

    
};





