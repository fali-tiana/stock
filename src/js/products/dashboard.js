$(function() {
        
    // initializing feather icons

    feather.replace();

    // datas from the database

    // const products = [
    //     {
    //         productName: "Laptop ACER",
    //         articleCode: "85743",
    //         quantity: "8",
    //         status: "Pending",
    //         date: "27-09-2023",
    //         link: "#",
    //     },
    //     {
    //         productName: "Iphone XS 128Gb",
    //         articleCode: "97245",
    //         quantity: "16",
    //         status: "Declined",
    //         date: "24-09-2023",
    //         link: "#",
    //     },
    //     {
    //         productName: "Stylo bleu",
    //         articleCode: "36452",
    //         quantity: "256",
    //         status: "Sucess",
    //         date: "23-09-2023",
    //         link: "#",
    //     },
    //     {
    //         productName: "Stylo vert",
    //         articleCode: "36452",
    //         quantity: "256",
    //         status: "Sucess",
    //         date: "23-09-2023",
    //         link: "#",
    //     },
    // ];

    // // inserting new element to the table

    // products.forEach((product) => {
    //     const trContent = `
    //         <td class="h-16 text-sm text-black">${product.productName}</td>
    //         <td class="h-16 text-sm text-black">${product.articleCode}</td>
    //         <td class="h-16 text-sm text-black">${product.quantity}</td>
    //         <td class="h-16 text-sm text-black"><div class="${
    //             product.status === "Declined"
    //                 ? "text-danger font-bo"
    //                 : product.status === "Pending"
    //                 ? "text-warning font-bold"
    //                 : "text-success font-bold"
    //         }">${product.status}</div></td>
    //         <td class="h-16 text-sm text-black">${product.date}</td>
    //         <td class="text-primary-300"><a href="${product.link}">Details</a></td>
    //     `;
    //     $('<tr class="last:mb-4">').html(trContent).appendTo('table tbody');
    // });

});   