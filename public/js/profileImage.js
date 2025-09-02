document.addEventListener("click", (event) => {
    // We use .closest() to check if the clicked element is our button,
    // or if the click came from an element *inside* our button (like the SVG icon).
    const targetButton = event.target.closest("#editButton");

    // If the click came from our "Edit Profile" button...
    if (targetButton) {
        const imageUpload = document.getElementById("imageUpload");
        // Only trigger the click if the file input exists on this page.
        if (imageUpload) {
            imageUpload.click();
        }
    }
});

// The 'change' event for the file input only needs to be attached once,
// as the input element itself isn't being replaced dynamically in the same way.
// We still check if it exists before trying to add the listener.
document.addEventListener("change", (event) => {
    const imageUpload = document.getElementById("imageUpload");
    if (imageUpload) {
            const file = event.target.files[0];
            const profileImage = document.getElementById("profileImage");

            // Proceed only if a file was selected and the image element exists.
            if (file && profileImage) {
                const reader = new FileReader();
                reader.onload = (e) => {
                    profileImage.src = e.target.result;
                };
                reader.readAsDataURL(file);
            }
       
    }
});
