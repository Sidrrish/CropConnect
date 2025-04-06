<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contract Farming | Crop Connect</title>
    <!-- Include Tailwind CSS -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100">

    <!-- Header Section -->
    <header class="bg-green-600 text-white py-4">
        <div class="container mx-auto px-4 flex justify-between items-center">
            <h1 class="text-2xl font-bold">Crop Connect</h1>
            <nav>
                <a href="index.php" class="text-white hover:text-green-300 px-4">Home</a>
                <a href="contracts.html" class="text-white hover:text-green-300 px-4">Contracts</a>
                <a href="about.html" class="text-white hover:text-green-300 px-4">About</a>
                <a href="contact.html" class="text-white hover:text-green-300 px-4">Contact</a>
            </nav>
        </div>
        <div id="google_translate_element"></div>
    </header>

    <!-- Hero Section -->
    <section class="hero-section bg-green-500 text-white py-16 text-center">
        <div class="container mx-auto px-4">
            <h2 class="text-4xl font-bold mb-4">Contract Farming Opportunities</h2>
            <p class="text-lg mb-8">Empowering farmers and buyers with secure and beneficial farming contracts.</p>
            <a href="#learn-more" class="bg-white text-green-500 px-6 py-3 rounded font-bold hover:bg-gray-100">Learn More</a>
        </div>
    </section>

    <!-- Introduction to Contract Farming -->
    <section id="learn-more" class="py-12">
        <div class="container mx-auto px-4">
            <h2 class="text-2xl font-bold mb-6">What is Contract Farming?</h2>
            <p class="mb-4">Contract farming involves agricultural production carried out according to an agreement between a buyer and farmers, which establishes conditions for the production and marketing of a farm product or products. Typically, the farmer agrees to provide established quantities of a specific agricultural product, while the buyer commits to purchasing it under agreed terms.</p>
            <p class="mb-4">This system provides farmers with a secure market for their produce and often includes technical support and access to high-quality inputs.</p>
        </div>
    </section>

    <!-- Benefits Section -->
    <section class="bg-white py-12">
        <div class="container mx-auto px-4">
            <h2 class="text-2xl font-bold mb-6">Benefits of Contract Farming</h2>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <div class="bg-gray-50 p-6 rounded shadow">
                    <h3 class="text-xl font-bold mb-2">Guaranteed Market Access</h3>
                    <p>Farmers have a guaranteed buyer for their produce, reducing the risk of market fluctuations and price drops.</p>
                </div>
                <div class="bg-gray-50 p-6 rounded shadow">
                    <h3 class="text-xl font-bold mb-2">Access to Quality Inputs</h3>
                    <p>Buyers often provide farmers with high-quality seeds, fertilizers, and other inputs, improving yield and quality.</p>
                </div>
                <div class="bg-gray-50 p-6 rounded shadow">
                    <h3 class="text-xl font-bold mb-2">Technical Assistance</h3>
                    <p>Farmers receive support and training from buyers on modern farming techniques and crop management.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Contract Creation Section -->
    <section class="py-12">
        <div class="container mx-auto px-4">
            <h2 class="text-2xl font-bold mb-6">Create a Contract</h2>
            <form id="contract-form" class="space-y-4">
                <input type="text" name="crop_type" placeholder="Crop Type" class="border rounded w-full px-4 py-2" required>
                <input type="number" name="quantity" placeholder="Quantity (in kg)" class="border rounded w-full px-4 py-2" required>
                <input type="text" name="price" placeholder="Price per kg" class="border rounded w-full px-4 py-2" required>
                <input type="date" name="delivery_date" placeholder="Delivery Date" class="border rounded w-full px-4 py-2" required>
                <textarea name="additional_terms" placeholder="Additional Terms" class="border rounded w-full px-4 py-2"></textarea>
                <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded">Create Contract</button>
            </form>

            <!-- Display Generated Contract ID -->
            <div id="contract-id-container" class="hidden bg-green-100 text-green-800 p-4 rounded shadow mt-4">
                <p><strong>Contract ID:</strong> <span id="generated-contract-id"></span></p>
            </div>
        </div>
    </section>

    <!-- Educational Resources Section -->
    <section class="bg-gray-100 py-12">
        <div class="container mx-auto px-4">
            <h2 class="text-2xl font-bold mb-6">Educational Resources</h2>
            <p class="mb-6">Learn more about contract farming through our resources:</p>
            <ul class="list-disc pl-6 space-y-2">
                <li><a href="#" class="text-green-500 hover:underline">Introduction to Contract Farming (PDF)</a></li>
                <li><a href="#" class="text-green-500 hover:underline">How to Negotiate Fair Contracts (Video)</a></li>
                <li><a href="#" class="text-green-500 hover:underline">FAQs on Contract Farming</a></li>
            </ul>
        </div>
    </section>

    <!-- Footer Section -->
    <footer class="bg-green-600 text-white py-6">
        <div class="container mx-auto px-4 text-center">
            <p>&copy; 2024 Crop Connect. All rights reserved.</p>
        </div>
    </footer>

    <!-- Google Translate -->
    <script type="text/javascript">
        function googleTranslateElementInit() {
            new google.translate.TranslateElement(
                {pageLanguage: 'en'},
                'google_translate_element'
            );
        }
    </script>
    <script type="text/javascript" src="https://translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>

    <!-- Contract ID Generator Script -->
    <script>
        document.getElementById("contract-form").addEventListener("submit", function(event) {
            event.preventDefault();

            function generateContractID() {
                const timestamp = Date.now().toString(36);
                const randomStr = Math.random().toString(36).substr(2, 5).toUpperCase();
                return `CC-${timestamp}-${randomStr}`;
            }

            const form = this;
const deliveryDateRaw = form.delivery_date.value;
const formattedDate = new Date(deliveryDateRaw).toISOString().split("T")[0]; // YYYY-MM-DD

const contractID = generateContractID();

document.getElementById("generated-contract-id").textContent = `${contractID} | Delivery: ${formattedDate}`;
document.getElementById("contract-id-container").classList.remove("hidden");


            console.log("Generated Contract ID:", contractID);

            this.reset(); // Optional: Clear form fields
        });
    </script>

</body>
</html>
