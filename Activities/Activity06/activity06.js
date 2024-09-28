let book1 = {
    title: "Fundamentals of Web Development",
    authors: [{first_name: "Arthur", last_name: "Keown"}, 
        {first_name: "John", last_name: "Martin"}]
};

let book2 = {
    title: "Data Structures",
    authors: [{first_name: "Mark", last_name: "Weiss"}, 
        {first_name: "Alice", last_name: "Martin"}]
};

let book_array = [book1, book2];

for (i = 0; i < book_array.length; i++) {
    document.write("<h2>" + book_array[i].title + "</h2>");
    for (j = 0; j < book_array[i].authors.length; j++) {
        document.write(book_array[i].authors[j].first_name + " " 
            + book_array[i].authors[j].last_name + "<br>");
    }
}