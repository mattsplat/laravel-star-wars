import React, {useEffect, useState} from 'react';
import ReactDOM from 'react-dom/client';
import GuestLayout from "@/Layouts/GuestLayout";
import Dropdown from "@/Components/Dropdown";

const elementId = 'planets-page';
function Planets() {
    const [planet, setPlanet] = useState(null);
    const [galaxyPopulation, setGalaxyPopulation] = useState(0);

    useEffect(() => {
        axios.get('/api/planets/galaxy').then((response) => {
            if(response.data) {
                setGalaxyPopulation(response.data.population);
            }
        });
    });

    const onPlanetChange = (e) => {
        setPlanet(e);
    }

    const renderPlanetInfo = () => {
        if(planet) {
            return (
                <div>
                    <a href="#">
                        <h5 className="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">{planet.label}</h5>
                    </a>
                    <p className="mb-3 font-normal text-gray-700 dark:text-gray-400">
                        {planet.population}
                    </p>
                </div>
            );
        } else if(galaxyPopulation > 0) {
            return (
                <div>
                    <a href="#">
                        <h5 className="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Galaxy Population</h5>
                    </a>
                    <p className="mb-3 font-normal text-gray-700 dark:text-gray-400">
                        {galaxyPopulation}
                    </p>
                </div>
            );
        }
        return "Select a planet to see more information";
    }
    const mapSpecies = () => {
        if(species.length === 0) {
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
        ))
    }

    return (
        <GuestLayout
            header={<h2 className="font-semibold text-xl text-gray-800 leading-tight">Profile</h2>}
        >

            <div className="py-12">
                <div className="mx-auto sm:px-6 lg:px-8 space-y-6">
                    <div className="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                        <Dropdown title="People" path='/api/planets' label='Select Planet'
                                  defaultOption='Galaxy Population'
                                 onSelect={onPlanetChange}/>
                    </div>

                    <div className="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                        {renderPlanetInfo()}
                    </div>

                </div>
            </div>
        </GuestLayout>
    );
}

export default Planets;

if (document.getElementById(elementId)) {
    const Index = ReactDOM.createRoot(document.getElementById(elementId));

    Index.render(
        <React.StrictMode>
            <Planets/>
        </React.StrictMode>
    )
}
