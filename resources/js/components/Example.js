import React, { useState, useEffect } from "react";
import ReactDOM from "react-dom";
import { Line } from "react-chartjs-2";
import axios from "axios";

function Example() {
    const [labels, setLabels] = useState([]);
    const [datasets, setDatasets] = useState([]);
    useEffect(() => {
        axios
            .get("api/activities")
            .then(function (response) {
                setLabels(response.data.label);
                setDatasets(response.data.message);
            })
            .catch(function (error) {
                console.log(error);
            });
    }, []);
    const data = {
        labels: labels,
        datasets: [
            {
                label: "Activities",
                fill: false,
                lineTension: 0.1,
                backgroundColor: "rgba(0, 181, 204, 1)",
                borderColor: "rgba(137, 196, 244, 1)",
                borderCapStyle: "butt",
                borderDash: [],
                borderDashOffset: 0.0,
                borderJoinStyle: "miter",
                pointBorderColor: "rgba(77, 5, 232, 1)",
                pointBackgroundColor: "#fff",
                pointBorderWidth: 3,
                pointHoverRadius: 7,
                pointHoverBackgroundColor: "rgba(65, 131, 215, 1)",
                pointHoverBorderColor: "rgba(82, 179, 217, 1)",
                pointHoverBorderWidth: 2,
                pointRadius: 1,
                pointHitRadius: 10,
                data: datasets,
            },
        ],
    };
    return (
        <div className="row justify-content-center">
            <div className="col-md-12">
                <div className="card">
                    <div className="card-header">
                        <span className="font-weight-bold">
                            Graph of the number of activities
                        </span>
                        <span className="font-weight-light">{`  ${new Date().toLocaleDateString("en-US")} - ${new Date(
                            new Date().setDate(new Date().getDate() - 8)
                        ).toLocaleDateString("en-US")}`}</span>
                    </div>
                    <div className="card-body">
                        {labels.length > 0 ? <Line data={data} /> : null}
                    </div>
                </div>
            </div>
        </div>
    );
}

export default Example;

if (document.getElementById("example")) {
    ReactDOM.render(<Example />, document.getElementById("example"));
}
