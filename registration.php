<?php
function clean($value) {
    return htmlspecialchars(trim((string)$value), ENT_QUOTES, 'UTF-8');
}

$submitted = $_SERVER["REQUEST_METHOD"] === "POST";
$errors = [];
$success = false;

$fullname = $email = $phone = $dob = $address = "";
$gender = $nationality = "";
$languages = [];
$hobbies = [];

if ($submitted) {
    $fullname = clean($_POST["fullname"] ?? "");
    $email = clean($_POST["email"] ?? "");
    $phone = clean($_POST["phone"] ?? "");
    $dob = clean($_POST["dob"] ?? "");
    $address = clean($_POST["address"] ?? "");
    $gender = clean($_POST["gender"] ?? "");
    $nationality = clean($_POST["nationality"] ?? "");

    $allowedLanguages = ["English", "French", "Kinyarwanda", "Kiswahili"];
    $allowedHobbies = ["Reading", "Coding", "Sports", "Music"];

    $languages = array_intersect(
        $allowedLanguages,
        $_POST["languages"] ?? []
    );

    $hobbies = array_intersect(
        $allowedHobbies,
        $_POST["hobbies"] ?? []
    );

    if ($fullname === "") {
        $errors[] = "Please enter your full name.";
    }

    if (!filter_var($_POST["email"] ?? "", FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Please enter a valid email address.";
    }

    if ($phone === "") {
        $errors[] = "Please enter your phone number.";
    }

    if ($dob === "") {
        $errors[] = "Please select your date of birth.";
    }

    if ($gender === "") {
        $errors[] = "Please select your gender.";
    }

    if ($nationality === "") {
        $errors[] = "Please select your nationality.";
    }

    if (empty($errors)) {
        $success = true;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Registration Form</title>

    <style>
        * {
            box-sizing: border-box;
        }

        body {
            font-family: Arial, sans-serif;
            background: #eef2f7;
            margin: 0;
            padding: 30px 15px;
        }

        .container {
            max-width: 650px;
            margin: auto;
            background: white;
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0 4px 15px #00000018;
        }

        h1 {
            text-align: center;
            color: #173b70;
        }

        .intro {
            text-align: center;
            color: #555;
            margin-bottom: 25px;
        }

        label, .group-title {
            display: block;
            font-weight: bold;
            margin: 15px 0 7px;
        }

        input[type="text"],
        input[type="email"],
        input[type="tel"],
        input[type="date"],
        select,
        textarea {
            width: 100%;
            padding: 11px;
            border: 1px solid #cbd2dc;
            border-radius: 6px;
            font-size: 15px;
        }

        .option {
            display: inline-block;
            margin: 7px 14px 5px 0;
            font-weight: normal;
        }

        .option input {
            margin-right: 5px;
        }

        button {
            width: 100%;
            padding: 13px;
            margin-top: 24px;
            background: #173b70;
            color: white;
            border: none;
            border-radius: 6px;
            font-size: 16px;
            cursor: pointer;
        }

        button:hover {
            background: #24549a;
        }

        .message {
            padding: 14px;
            border-radius: 6px;
            margin-bottom: 18px;
        }

        .success {
            background: #e3f7e8;
            color: #17652b;
        }

        .error {
            background: #ffe8e8;
            color: #9b1c1c;
        }

        .result p {
            line-height: 1.6;
            overflow-wrap: anywhere;
        }
    </style>
</head>

<body>
<div class="container">

    <h1>Student Registration</h1>
    <p class="intro">Please complete the form below.</p>

    <?php if ($success): ?>
        <div class="message success">
            <h2>Registration Successful!</h2>
            <p>Thank you for registering, <?= $fullname ?>.</p>
        </div>

        <div class="result">
            <h3>Your Registration Details</h3>
            <p><strong>Full name:</strong> <?= $fullname ?></p>
            <p><strong>Email:</strong> <?= $email ?></p>
            <p><strong>Phone:</strong> <?= $phone ?></p>
            <p><strong>Date of birth:</strong> <?= $dob ?></p>
            <p><strong>Gender:</strong> <?= $gender ?></p>
            <p><strong>Nationality:</strong> <?= $nationality ?></p>
            <p><strong>Address:</strong> <?= $address ?: "Not provided" ?></p>
            <p><strong>Languages:</strong>
                <?= $languages ? clean(implode(", ", $languages)) : "None selected" ?>
            </p>
            <p><strong>Hobbies:</strong>
                <?= $hobbies ? clean(implode(", ", $hobbies)) : "None selected" ?>
            </p>
        </div>

        <button type="button" onclick="window.location.href='registration.php'">
            Register Another Student
        </button>

    <?php else: ?>

        <?php if (!empty($errors)): ?>
            <div class="message error">
                <strong>Please correct these errors:</strong>
                <ul>
                    <?php foreach ($errors as $error): ?>
                        <li><?= clean($error) ?></li>
                    <?php endforeach; ?>
                </ul>
            </div>
        <?php endif; ?>

        <form method="POST" action="">

            <label for="fullname">Full Name *</label>
            <input type="text" id="fullname" name="fullname"
                   value="<?= $fullname ?>" required>

            <span class="group-title">Gender *</span>
            <?php foreach (["Female", "Male", "Prefer not to say"] as $option): ?>
                <label class="option">
                    <input type="radio" name="gender"
                           value="<?= $option ?>"
                           <?= $gender === $option ? "checked" : "" ?> required>
                    <?= $option ?>
                </label>
            <?php endforeach; ?>

            <label for="nationality">Nationality *</label>
            <select id="nationality" name="nationality" required>
                <option value="">-- Select nationality --</option>
                <?php foreach ([
                    "Rwandan", "Ugandan", "Kenyan", "Tanzanian",
                    "Burundian", "South Sudanese", "Congolese", "Other"
                ] as $option): ?>
                    <option value="<?= $option ?>"
                        <?= $nationality === $option ? "selected" : "" ?>>
                        <?= $option ?>
                    </option>
                <?php endforeach; ?>
            </select>

            <label for="email">Email Address *</label>
            <input type="email" id="email" name="email"
                   value="<?= $email ?>" required>

            <label for="phone">Phone Number *</label>
            <input type="tel" id="phone" name="phone"
                   value="<?= $phone ?>" required>

            <label for="dob">Date of Birth *</label>
            <input type="date" id="dob" name="dob"
                   value="<?= $dob ?>" required>

            <label for="address">Residence / Address</label>
            <textarea id="address" name="address"
                      rows="3"><?= $address ?></textarea>

            <span class="group-title">Languages Spoken</span>
            <?php foreach (["English", "French", "Kinyarwanda", "Kiswahili"] as $option): ?>
                <label class="option">
                    <input type="checkbox" name="languages[]"
                           value="<?= $option ?>"
                           <?= in_array($option, $languages) ? "checked" : "" ?>>
                    <?= $option ?>
                </label>
            <?php endforeach; ?>

            <span class="group-title">Hobbies</span>
            <?php foreach (["Reading", "Coding", "Sports", "Music"] as $option): ?>
                <label class="option">
                    <input type="checkbox" name="hobbies[]"
                           value="<?= $option ?>"
                           <?= in_array($option, $hobbies) ? "checked" : "" ?>>
                    <?= $option ?>
                </label>
            <?php endforeach; ?>

            <button type="submit">Register Now</button>
        </form>

    <?php endif; ?>

</div>
</body>
</html>
