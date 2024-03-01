/*
//...
        document.getElementById("articleForm").reset();
    } else {
        alert("Veuillez remplir tous les champs.");
    }
});
*/
function publishArticle(title, content) {
    document.getElementById("articles");
    article.innerHTML = `
        <h2>${title}</h2>
        <p>${content}</p>
    `;
    articlesDiv.prepend(article);
}
