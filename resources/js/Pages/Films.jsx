import React, {useState} from 'react';
import ReactDOM from 'react-dom/client';
import GuestLayout from "@/Layouts/GuestLayout";
import Dropdown from "@/Components/Dropdown";
import Loader from "@/Components/Loader";

const elementId = 'films-page';

function Films() {
    const [film, setFilm] = useState(null);
    const [species, setSpecies] = useState([]);
    const [isLoading, setIsLoading] = useState(false);
    const onFilmChange = (e) => {
        setFilm(e);
        getSpecies(e.value);

    }
    const getSpecies = (id) => {
        setIsLoading(true);
        axios.get('/api/films/' + id + '/species').then((response) => {
            if (response.data && response.data.length > 0) {
                setSpecies(response.data);
            }
            setIsLoading(false);
        });
    }
    const mapSpecies = () => {
        if (species.length === 0) {
            return (
                <tr className="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                    <th scope="row"
                        className="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        No Species
                    </th>
                </tr>
            )
        }
        return species.map((s, index) => (
            <tr className="bg-white border-b dark:bg-gray-800 dark:border-gray-700" key={index}>
                <th scope="row"
                    className="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    {s.name}
                </th>
                <td className="px-6 py-4">
                    {s.classification}
                </td>
                <td className="px-6 py-4">
                    {s.designation}
                </td>
                <td className="px-6 py-4">
                    {s.average_height}
                </td>
            </tr>
        ));
    }

    return (
        <GuestLayout
            header={<h2 className="font-semibold text-xl text-gray-800 leading-tight">Profile</h2>}
        >

            <div className="py-12">
                <div className="mx-auto sm:px-6 lg:px-8 space-y-6">
                    <div className="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                        <Dropdown title="People" path='/api/films' label={'Select Film'}
                                  labelKey='title' onSelect={onFilmChange}/>
                    </div>

                    <div className="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                        {isLoading && <Loader/>}
                        <div className="relative overflow-x-auto">
                            <table className="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                                <thead
                                    className="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                <tr>
                                    <th scope="col" className="px-6 py-3">
                                        Name
                                    </th>
                                    <th scope="col" className="px-6 py-3">
                                        Model
                                    </th>
                                    <th scope="col" className="px-6 py-3">
                                        Manufacturer
                                    </th>
                                    <th scope="col" className="px-6 py-3">
                                        Cost
                                    </th>
                                </tr>
                                </thead>
                                <tbody>
                                {mapSpecies()}
                                </tbody>
                            </table>
                        </div>

                    </div>

                </div>
            </div>
        </GuestLayout>
    );
}

export default Films;

if (document.getElementById(elementId)) {
    const Index = ReactDOM.createRoot(document.getElementById(elementId));

    Index.render(
        <React.StrictMode>
            <Films/>
        </React.StrictMode>
    )
}
