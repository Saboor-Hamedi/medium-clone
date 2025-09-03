document.addEventListener("DOMContentLoaded", () => {
    const profileImage = document.getElementById("profileImage");
    const originalImageSrc = profileImage ? profileImage.src : "";

    document.addEventListener("click", (event) => {
        const targetButton = event.target.closest("#editButton");
        if (targetButton) {
            const imageUpload = document.getElementById("imageUpload");
            if (imageUpload) {
                imageUpload.click();
            }
        }
    });

    document.addEventListener("change", (event) => {
        const imageUpload = document.getElementById("imageUpload");
        if (imageUpload && event.target === imageUpload) {
            const file = event.target.files[0];
            if (file && profileImage) {
                const reader = new FileReader();
                reader.onload = (e) => {
                    profileImage.src = e.target.result;
                    document.querySelector(".edit-button-div").style.display =
                        "none";
                    document.querySelector(".save-button-div").style.display =
                        "block";
                    document.querySelector(".cancel-button-div").style.display =
                        "block";
                };
                reader.readAsDataURL(file);
            }
        }
    });

    const cancelButton = document.getElementById("cancelButton");
    if (cancelButton) {
        cancelButton.addEventListener("click", () => {
            document.querySelector(".edit-button-div").style.display = "block";
            document.querySelector(".save-button-div").style.display = "none";
            document.querySelector(".cancel-button-div").style.display = "none";
            document.getElementById("imageUpload").value = "";
            if (profileImage) {
                profileImage.src = originalImageSrc;
            }
        });
    }

    const form = document.querySelector("form");
    if (form) {
        form.addEventListener("submit", (event) => {
            event.preventDefault(); // Remove for actual server submission
            document.querySelector(".edit-button-div").style.display = "block";
            document.querySelector(".save-button-div").style.display = "none";
            document.querySelector(".cancel-button-div").style.display = "none";
            document.getElementById("imageUpload").value = "";
            if (profileImage) {
                profileImage.src = originalImageSrc;
            }
        });
    }
});
