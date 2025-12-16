<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tailwind CSS Demo - CI4 BSIT3A</title>
    <link href="<?= base_url('css/output.css') ?>" rel="stylesheet">
</head>
<body class="bg-gray-100">
    <div class="container mx-auto px-4 py-8">
        <!-- Header -->
        <div class="bg-white rounded-lg shadow-lg p-6 mb-8">
            <h1 class="text-4xl font-bold text-gray-800 mb-2">Tailwind CSS Demo</h1>
            <p class="text-gray-600">This page demonstrates that Tailwind CSS is working offline!</p>
        </div>

        <!-- Feature Cards -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
            <!-- Card 1 -->
            <div class="bg-blue-500 text-white rounded-lg shadow-md p-6 transform hover:scale-105 transition-transform">
                <div class="text-3xl mb-4">🚀</div>
                <h2 class="text-xl font-bold mb-2">Fast</h2>
                <p>Tailwind CSS loads instantly from your local server</p>
            </div>

            <!-- Card 2 -->
            <div class="bg-green-500 text-white rounded-lg shadow-md p-6 transform hover:scale-105 transition-transform">
                <div class="text-3xl mb-4">📡</div>
                <h2 class="text-xl font-bold mb-2">Offline</h2>
                <p>Works without any internet connection required</p>
            </div>

            <!-- Card 3 -->
            <div class="bg-purple-500 text-white rounded-lg shadow-md p-6 transform hover:scale-105 transition-transform">
                <div class="text-3xl mb-4">🎨</div>
                <h2 class="text-xl font-bold mb-2">Customizable</h2>
                <p>Easily customize and extend with utility classes</p>
            </div>
        </div>

        <!-- Button Examples -->
        <div class="bg-white rounded-lg shadow-lg p-6 mb-8">
            <h2 class="text-2xl font-bold text-gray-800 mb-4">Button Examples</h2>
            <div class="flex flex-wrap gap-3">
                <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                    Primary
                </button>
                <button class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">
                    Success
                </button>
                <button class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">
                    Danger
                </button>
                <button class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded">
                    Secondary
                </button>
                <button class="bg-yellow-500 hover:bg-yellow-600 text-white font-bold py-2 px-4 rounded">
                    Warning
                </button>
            </div>
        </div>

        <!-- Form Example -->
        <div class="bg-white rounded-lg shadow-lg p-6 mb-8">
            <h2 class="text-2xl font-bold text-gray-800 mb-4">Form Example</h2>
            <form class="space-y-4">
                <div>
                    <label class="block text-gray-700 font-bold mb-2" for="name">
                        Name
                    </label>
                    <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" 
                           id="name" type="text" placeholder="Enter your name">
                </div>
                <div>
                    <label class="block text-gray-700 font-bold mb-2" for="email">
                        Email
                    </label>
                    <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" 
                           id="email" type="email" placeholder="Enter your email">
                </div>
                <div>
                    <label class="block text-gray-700 font-bold mb-2" for="message">
                        Message
                    </label>
                    <textarea class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" 
                              id="message" rows="4" placeholder="Enter your message"></textarea>
                </div>
                <div class="flex items-center justify-between">
                    <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" 
                            type="button">
                        Submit
                    </button>
                    <a class="inline-block align-baseline font-bold text-sm text-blue-500 hover:text-blue-800" href="<?= base_url('/') ?>">
                        Back to Home
                    </a>
                </div>
            </form>
        </div>

        <!-- Alert Examples -->
        <div class="space-y-4">
            <h2 class="text-2xl font-bold text-gray-800 mb-4">Alert Examples</h2>
            
            <div class="bg-blue-100 border-l-4 border-blue-500 text-blue-700 p-4" role="alert">
                <p class="font-bold">Info</p>
                <p>This is an informational alert using Tailwind CSS.</p>
            </div>

            <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4" role="alert">
                <p class="font-bold">Success</p>
                <p>Your action was completed successfully!</p>
            </div>

            <div class="bg-yellow-100 border-l-4 border-yellow-500 text-yellow-700 p-4" role="alert">
                <p class="font-bold">Warning</p>
                <p>Please be cautious with this action.</p>
            </div>

            <div class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4" role="alert">
                <p class="font-bold">Error</p>
                <p>Something went wrong. Please try again.</p>
            </div>
        </div>

        <!-- Footer -->
        <footer class="mt-8 text-center text-gray-600">
            <p class="text-sm">Created by Jan Russel E. Peñafiel</p>
            <p class="text-xs mt-2">Tailwind CSS v3.4.0 - Installed locally for offline use</p>
        </footer>
    </div>
</body>
</html>
