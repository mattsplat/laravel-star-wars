import React from "react";

function Loader() {
    return (
        <div
            className="flex items-center justify-center w-56 h-56 border border-green-200 rounded-lg bg-gray-50 dark:bg-gray-800 dark:border-gray-700">
            <div
                className="px-3 py-1 text-xs font-medium leading-none text-center text-blue-800 bg-blue-600 rounded-full animate-pulse dark:bg-blue-900 dark:text-blue-200">loading...
            </div>
        </div>
    );
}

export default Loader;
