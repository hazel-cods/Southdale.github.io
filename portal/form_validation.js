
document.addEventListener("DOMContentLoaded", function () {
    const form = document.querySelector("registration-form");

    form.addEventListener("submit", function (event) {
        let valid = true;

        function showError(input, message) {
            alert(message);
            input.focus();
            valid = false;
        }

        function validateText(input, minLen, errorMessage) {
            const pattern = /^[A-Za-z\s]+$/;
            if (!pattern.test(input.value) || input.value.length < minLen) {
                showError(input, errorMessage);
            }
        }

        function validateNumber(input, min, max, errorMessage) {
            const value = parseInt(input.value);
            if (isNaN(value) || value < min || value > max) {
                showError(input, errorMessage);
            }
        }

        function validatePhone(input, errorMessage) {
            const pattern = /^\d{10,15}$/;
            if (!pattern.test(input.value)) {
                showError(input, errorMessage);
            }
        }

        function validateEmail(input, errorMessage) {
            const pattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            if (!pattern.test(input.value)) {
                showError(input, errorMessage);
            }
        }

        function validateZip(input, errorMessage) {
            const pattern = /^\d{4,6}$/;
            if (!pattern.test(input.value)) {
                showError(input, errorMessage);
            }
        }

        // Validate required fields
        validateText(form.last_name, 2, "Last Name must contain only letters and be at least 2 characters!");
        validateText(form.first_name, 2, "First Name must contain only letters and be at least 2 characters!");
        if (form.mi.value.trim() !== "") {
            validateText(form.mi, 1, "Middle Initial must be a single letter!");
        }
        validateNumber(form.age, 10, 100, "Age must be between 10 and 100!");
        if (!form.birthday.value) {
            showError(form.birthday, "Please enter a valid birthdate!");
        }
        validateText(form.religion, 2, "Religion must contain only letters!");
        validateText(form.status, 2, "Status must contain only letters!");
        validatePhone(form.phone, "Phone number must be 10-15 digits!");
        validateEmail(form.email, "Please enter a valid email address!");
        validateText(form.country, 2, "Country must contain only letters!");
        validateZip(form.zip, "ZIP Code must be 4-6 digits!");
        validateText(form.region, 2, "Region must contain only letters!");
        validateText(form.city, 2, "City must contain only letters!");
        validateText(form.barangay, 2, "Barangay must contain only letters!");
        validateText(form.mother_name, 2, "Mother's Name must contain only letters!");
        validateText(form.father_name, 2, "Father's Name must contain only letters!");
        validatePhone(form.mother_phone, "Mother's phone must be 10-15 digits!");
        validatePhone(form.father_phone, "Father's phone must be 10-15 digits!");
        validateText(form.mother_occupation, 2, "Mother's Occupation must contain only letters!");
        validateText(form.father_occupation, 2, "Father's Occupation must contain only letters!");

        if (!valid) {
            event.preventDefault(); // Prevent form submission if validation fails
        }
    });
});
