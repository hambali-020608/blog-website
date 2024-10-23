<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login pages</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
 <div class="flex items-center content-center py-9 mt-44 justify-center h-52 "> 
    <div
      class="w-80 rounded-lg shadow h-auto p-6 bg-white relative overflow-hidden"
    >
      <div class="flex flex-col justify-center items-center space-y-2">
        <h2 class="text-2xl font-medium text-slate-700">Login</h2>
        <p class="text-slate-500">Enter details below.</p>
      </div>
      <form class="w-full mt-4 space-y-3" method="POST">
        @csrf
        <div>
          <input
            class="outline-none border-2 rounded-md px-2 py-1 text-slate-500 w-full focus:border-blue-300"
            placeholder="Email"
            id="Email"
            name="email"
            type="text"
          />
        </div>
        <div>
          <input
            class="outline-none border-2 rounded-md px-2 py-1 text-slate-500 w-full focus:border-blue-300"
            placeholder="Password"
            id="password"
            name="password"
            type="password"
          />
        </div>
        <div class="flex items-center justify-between">
          <div class="flex items-center">
            <input
              class="mr-2 w-4 h-4"
              id="remember"
              name="remember"
              type="checkbox"
            />
            <span class="text-slate-500">Remember me </span>
          </div>
          <a class="text-blue-500 font-medium hover:underline" href="#"
            >Forgot Password</a
          >
        </div>
        <button
          class="w-full justify-center py-1 bg-blue-400 hover:bg-blue-600 active:bg-blue-700 rounded-md text-white ring-2"
          id="login"
          name="login"
          type="submit"
        >
          login
        </button>
        <p class="flex justify-center space-x-1">
          <span class="text-slate-700"> Have an account? </span>
          <a class="text-blue-500 hover:underline" href="/registrasi">Sign Up</a>
        </p>
      </form>
    </div>
</div>

</body>
</html>