import React, {useState} from 'react';
import ReactDOM from 'react-dom/client';
import GuestLayout from "@/Layouts/GuestLayout";
import Dropdown from "@/Components/Dropdown";
import Loader from "@/Components/Loader";

const elementId = 'people-page';

function People() {
    const [person, setPerson] = useState(null);
    const [ships, setShips] = useState([]);
    const [isLoading, setIsLoading] = useState(false);

    const onPersonChange = (e) => {
        setPerson(e)
        getShips(e.value)
    }
    const getShips = (id) => {
        setIsLoading(true);
        axios.get('/api/people/' + id + '/starships').then((response) => {
            if (response.data && response.data.length > 0) {
                setShips(response.data);
            }
            setIsLoading(false);
        });
    }
    const mapShips = () => {
        if (ships.length === 0) {
            return (
                <tr className="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                    <th scope="row"
                        className="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        No Ships
                    </th>
                </tr>
            )
        }
        return ships.map((ship, index) => (
            <tr className="bg-white border-b dark:bg-gray-800 dark:border-gray-700" key={index}>
                <th scope="row"
                    className="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    {ship.name}
                </th>
                <td className="px-6 py-4">
                    {ship.model}
                </td>
                <td className="px-6 py-4">
                    {ship.manufacturer}
                </td>
                <td className="px-6 py-4">
                    {ship.cost_in_credits}
                </td>
            </tr>
        ))
    }

    return (
        <GuestLayout
            header={<h2 className="font-semibold text-xl text-gray-800 leading-tight">Profile</h2>}
        >

            <div className="py-12">
                <div className="mx-auto sm:px-6 lg:px-8 space-y-6">
                    <div className="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                        <Dropdown title="People" path={'/api/people'} label={'Select Person'}
                                  onSelect={onPersonChange}/>
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
                                {mapShips()}
                                </tbody>
                            </table>
                        </div>

                    </div>

                </div>
            </div>
        </GuestLayout>
    );
}

export default People;

if (document.getElementById(elementId)) {
    const Index = ReactDOM.createRoot(document.getElementById(elementId));

    Index.render(
        <React.StrictMode>
            <People/>
        </React.StrictMode>
    )
}
