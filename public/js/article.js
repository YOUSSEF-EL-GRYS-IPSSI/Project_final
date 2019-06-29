function getArticles(){
    let data = {
        startPeriod: document.getElementById("startPeriod").value,
        endPeriod: document.getElementById("endPeriod").value
    };
    let xhr = new XMLHttpRequest(); // Création d'XMLHttpRequest
    xhr.open('POST', 'http://website.localhost/Article/getArticlesByDatePost', true);
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xhr.onreadystatechange = function() {//Call a function when the state changes.
        if(xhr.readyState == 4 && xhr.status == 200) {
           let data = JSON.parse(xhr.responseText);
           console.log(data);
           let article = new Article(data.id, data.title, data.created_at, data.content, data.summary, data.isPublish, data.image, data.video, data.collection);
           article.toHtml();
        }
    }
    xhr.send("data="+JSON.stringify(data));
}

class Article{
    constructor(id, title, createdAt, content, summary, isPublish, image, video, collection){
        this.id = id;
        this.title = title;
        this.createdAt = createdAt;
        this.content = content;
        this.summary = summary;
        this.isPublish = isPublish;
        this.image = image;
        this.video = video;
        this.collection = collection;
    }

    toHtml = function(){
        let div = "<div id='article'>";
        div += "<p>"+this.id+"</p>";
        div += "<h3>"+this.title+"</h3>";
        div += "<p>"+this.createdAt+"</p>";
        div += "<p>"+this.content+"</p>";
        div += "<p>"+this.summary+"</p>";
        div += "<p>"+this.image+"</p>";
        div += "<p>"+this.video+"</p>";
        div += "<p>"+this.collection+"</p>";
        document.getElementById("articles").innerHTML = div;
    }
}