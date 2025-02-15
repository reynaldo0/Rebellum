export default function Login() {
    return (
        <div className="flex h-screen items-center justify-center bg-gray-100">
            <div className="bg-white shadow-lg rounded-lg flex max-w-4xl w-full">
                {/* Left Side */}
                <div className="w-1/2 p-10 flex flex-col items-center justify-center">
                    <h1 className="text-2xl font-bold text-gray-900">TeFa Hexagon</h1>
                    <p className="text-gray-500 text-sm mt-2">
                        Create an account and access our feature!
                    </p>
                    <img
                        src="https://undraw.co/illustrations" // Ganti dengan ilustrasi sesuai kebutuhan
                        alt="Illustration"
                        className="mt-6 w-40"
                    />
                </div>

                {/* Right Side (Login Form) */}
                <div className="w-1/2 p-10">
                    <h2 className="text-sm text-gray-500">Manage Content</h2>
                    <h1 className="text-2xl font-bold text-gray-900 mt-1">
                        Sign In to Access Dashboard
                    </h1>

                    <form className="mt-6">
                        <div>
                            <label className="text-gray-700 text-sm font-semibold">
                                Email
                            </label>
                            <div className="relative mt-1">
                                <input
                                    type="email"
                                    className="w-full px-4 py-2 border rounded-lg focus:ring focus:ring-blue-300 focus:border-blue-500"
                                    placeholder="Enter your email"
                                />
                                <span className="absolute right-3 top-3 text-gray-400">
                                    📧
                                </span>
                            </div>
                        </div>

                        <div className="mt-4">
                            <label className="text-gray-700 text-sm font-semibold">
                                Password
                            </label>
                            <div className="relative mt-1">
                                <input
                                    type="password"
                                    className="w-full px-4 py-2 border rounded-lg focus:ring focus:ring-blue-300 focus:border-blue-500"
                                    placeholder="Enter your password"
                                />
                                <span className="absolute right-3 top-3 text-gray-400">
                                    🔒
                                </span>
                            </div>
                        </div>

                        <button className="w-full mt-6 bg-blue-600 text-white py-2 rounded-lg hover:bg-blue-700 transition">
                            Sign In
                        </button>
                    </form>
                </div>
            </div>
        </div>
    );
}
