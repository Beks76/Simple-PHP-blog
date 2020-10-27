$('.filter').click(function() {
    let id = $(this).attr('order');
    if(id == 1) {
        getPosts()
    }
    else {
        getPostsDesc();
    }
});
getPosts();
getCategories();

post_user_id = $('#user_data').attr('user_id');

getSelfPosts(post_user_id);

$('.btn-black').click(function(e) {
    e.preventDefault();

    $('input').removeClass('error');

    let login = $('input[name="email"]').val(),
    password = $('input[name="password"]').val();

    $.post( "vendor/to_signin.php", { email: login, password: password }, function(data) {
        result = JSON.parse(data);

        if(result.status) { 
            document.location.href = 'pages/profile.php';
        }
        else {
            if(result.type == 1) {
                result.fields.forEach(field => {
                    $(`input[name="${field}"]`).addClass('error');
                });
            }
            $('.msg').removeClass('none').text(result.message);
        }

    });

});


$('.register').click(function(e) {
    e.preventDefault();

    $('input').removeClass('error');

    let f_name = $('input[name="full_name"]').val(),
    login = $('input[name="email"]').val(),
    password = $('input[name="password"]').val(),
    conf_password = $('input[name="conf_password"]').val();

    $.post("vendor/to_signup.php", {full_name: f_name, email: login, password: password, conf_password: conf_password}, function(data) {
        result = JSON.parse(data);

        if(result.status) {
            document.location.href = 'index.php';
        }
        else {
            $('.msg').removeClass('none').text(result.message);
        }
    });

});

$('.write').click(function() {
    $('.post').removeClass('none');
});

$('.hide').click(function() {
    $('.post').addClass('none');
});

$('#addPost').click(function(e) {
    e.preventDefault();
    let title = $('input[name="title"]').val(),
        category = $('#category').val(),
        descr = $('#descr').val(),
        text = $('#content').val();

    console.log(title, category, descr, text);

    $.post("../vendor/to_writepost.php", {title: title, category: category, descr: descr, text: text}, function(data) {
        result = JSON.parse(data);
        if(result.status) {
            $('.msg').removeClass('none').text(result.message);
            $('input[name="title"]').val("");
            $('#descr').val("");
            $('#content').val("");
        }
        else {
            if(result.type == 1) {
                result.fields.forEach(field => {
                    $(`#${field}`).addClass('error');
                });
            }
            $('.msg').removeClass('none').text(result.message);
        }

        getPosts();
    });
});

$('#search_post').keyup(function() {
    let txt =  $(this).val(),
    indx = [];
    if(txt != '') {
        $.get("../vendor/getposts.php", {}, function(data) {
            let result = JSON.parse(data);
            for(i = 0; i < result.length; i++) {
                j = 0;
                if(result[i]['Title'].indexOf(txt) == -1) {
                    console.log('not ', i);
                }
                else {
                    console.log(i);
                    indx.push(i);
                }
            }
            console.log(indx.length);
            HTML = "";
            for(i = 0; i < indx.length; i++) {
                HTML += `<div class="col-lg-4">`
                HTML += ` <div class="card text-center mt-4">
                            <div class="card-header">
                                <p class="card-text"> by <a href="#">${result[indx[i]]['userName']}</a></p>
                                <p class="card-text"> ${result[indx[i]]['category']} </p>
                            </div>`

                HTML += `<div class="card-body">
                            <h5 class="card-title">${result[indx[i]]['Title']}</h5>
                            <p class="card-text"> ${result[indx[i]]['Description']} </p>
                            <a href="single_blog.php?id=${result[i]['Id']}" class="btn btn-primary">Read more</a>
                        </div>`

                HTML += `<div class="card-footer text-muted">
                            ${result[indx[i]]['Publish_date']}
                        </div>`
                HTML += `</div>`
                HTML += `</div>`
            }

            $("#post_block").html(HTML);
        });
    }
    else {
        HTML = ""
        $("#post_block").html(HTML);
        getPosts();
    }
});

$('.cat').click(function() {
    let id = $(this).attr('filter')
    if($(this).attr('val') == 'off') {
        $.get("../vendor/getposts.php", {}, function(data) {
            let result = JSON.parse(data);
            HTML = "";
            for(i = 0; i < result.length; i++) {
                if(result[i]['category'] == id) {
                    HTML += `<div class="col-lg-4">`
                    HTML += ` <div class="card text-center mt-4">
                                <div class="card-header">
                                    <p class="card-text"> by <a href="#">${result[i]['userName']}</a></p>
                                    <p class="card-text"> ${result[i]['category']} </p>
                                </div>`
    
                    HTML += `<div class="card-body">
                                <h5 class="card-title">${result[i]['Title']}</h5>
                                <p class="card-text"> ${result[i]['Description']} </p>
                                <a href="single_blog.php?id=${result[i]['Id']}" class="btn btn-primary">Read more</a>
                            </div>`
    
                    HTML += `<div class="card-footer text-muted">
                                ${result[i]['Publish_date']}
                            </div>`
                    HTML += `</div>`
                    HTML += `</div>`
                }
            }
            $("#post_block").html(HTML);
        });
    }
    else {
        HTML = "";
        $("#post_block").html(HTML);
        getPosts();
    }
});

function getPosts() {
    $.get("../vendor/getposts.php", {}, function(data) {
        let posts = JSON.parse(data);

        HTML = "";

        for(i = 0; i < posts.length; i++) {
            HTML += `<div class="col-lg-4">`
            HTML += ` <div class="card text-center mt-4">
                        <div class="card-header">
                            <p class="card-text"> by <a href="#">${posts[i]['userName']}</a></p>
                            <p class="card-text"> ${posts[i]['category']} </p>
                        </div>`

            HTML += `<div class="card-body">
                        <h5 class="card-title">${posts[i]['Title']}</h5>
                        <p class="card-text"> ${posts[i]['Description']} </p>
                        <a href="single_blog.php?id=${posts[i]['Id']}" class="btn btn-primary">Read more</a>
                    </div>`

            HTML += `<div class="card-footer text-muted">
                        ${posts[i]['Publish_date']}
                    </div>`
            HTML += `</div>`
            HTML += `</div>`

        }

        $("#post_block").html(HTML);
    });
}

function getPostsDesc() {
    $.get("../vendor/getposts.php", {}, function(data) {
        let posts = JSON.parse(data);

        HTML = "";

        for(i = posts.length - 1; i >= 0; i--) {
            HTML += `<div class="col-lg-4">`
            HTML += ` <div class="card text-center mt-4">
                        <div class="card-header">
                            <p class="card-text"> by <a href="#">${posts[i]['userName']}</a></p>
                            <p class="card-text"> ${posts[i]['category']} </p>
                        </div>`

            HTML += `<div class="card-body">
                        <h5 class="card-title">${posts[i]['Title']}</h5>
                        <p class="card-text"> ${posts[i]['Description']} </p>
                        <a href="single_blog.php?id=${posts[i]['Id']}" class="btn btn-primary">Read more</a>
                    </div>`

            HTML += `<div class="card-footer text-muted">
                        ${posts[i]['Publish_date']}
                    </div>`
            HTML += `</div>`
            HTML += `</div>`

        }

        $("#post_block").html(HTML);
    });
}

function getCategories() {
    $.get("../vendor/getcategories.php", {}, function(data) {
        categories=JSON.parse(data);
        HTML="<option value='0'>Select category</option>";
        for(i=0; i<categories.length; i++){
            HTML+= "<option value = '"+categories[i]['Id']+"'>"+categories[i]['Name']+"</option>";
        }
        $('#category').html(HTML);
    });
}

function getSelfPosts(id) {
    $.get("../vendor/getposts.php", function(data){

        let posts = JSON.parse(data);

        tableHTML = "";
        console.log('s = ',posts)
        console.log(posts[0]['User_Id']);
        console.log('para = ', id)
        for(i=0;i<posts.length;i++){
            if(id == posts[0]['User_Id']) {
                tableHTML+="<tr>";
                tableHTML+="<td>"+posts[i]['Id']+"</td>";
                tableHTML+= `<td><a href="single_blog.php?id=${posts[i]['Id']}">"${posts[i]['Title']}"</a></td>`;
                tableHTML+="<td>"+posts[i]['Description']+"</td>";
                tableHTML+="<td><button class = 'btn' onclick = 'deletePost("+posts[i]['Id']+")'>DELETE</button></td>";
                tableHTML+="</tr>";
            }
        }

        $("#result").html(tableHTML);

    });
}


function deletePost(postId){

    $.post("../vendor/deletepost.php", {
        
        "id": postId

    }, function(data){
        getSelfPosts(post_user_id);

    });
}