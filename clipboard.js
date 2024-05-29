function clipboardExport() {
    

    let email = document.querySelectorAll(".email");
    console.log(email);

    let emailTab = "";

    email.forEach((emailValue) => {
        if (emailValue.dataset.status == "Abonné.e") {
            emailTab += emailValue.textContent + " ";
        }
    });
    console.log(emailTab);


    navigator.clipboard.writeText(emailTab);
}
