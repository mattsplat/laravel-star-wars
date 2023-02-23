import * as React from 'react';
import {useEffect, useState} from "react";

const DropDown = ({
                      value, path, label = 'select', onSelect,
                      primaryKey = 'id', labelKey = 'name',
                      defaultOption = "Select", ...props
                  }) => {
    const [options, setOptions] = useState([]);

    useEffect(() => {
        const fetchData = () => {
            fetch(path)
                .then((response) => response.json())
                .then((data) => {
                    // map data to options
                    const list = data.results.map((item) => {
                        return {value: item[primaryKey], label: item[labelKey], ...item};
                    })
                    setOptions(list);
                });
        }
        fetchData();
    }, [])

    const handleChange = (event) => {
        onSelect(options.find((o) => o.value === event.target.value));
    };

    return (
        <div>
            <select data-te-select-init
                    onChange={handleChange}
                    className="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                <option value="">{defaultOption}</option>
                {options.map((option, index) => (
                    <option value={option.value} key={index}>{option.label}</option>
                ))}

            </select>
            <label data-te-select-label-ref className="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                {label}
            </label>

        </div>
    );
};

export default DropDown;
