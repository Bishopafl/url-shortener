import React, { useState } from 'react';
import Papa from 'papaparse';
import { Inertia } from '@inertiajs/inertia';

const FileUpload = () => {
    const [file, setFile] = useState(null);

    const handleFileChange = (e) => {
        setFile(e.target.files[0]);
    };

    const handleUpload = () => {
        if(file) {
            Papa.parse(file, {
                header: true,
                complete: (results) => {
                    const urls = results.data.map(row => row.long_url);
                    Inertia.post('/upload', { urls });
                },
            });
        }
    };

    return (
        <div>
            <input type="file" onChange={handleFileChange} />
            <button onClick={handleUpload}>Upload</button>
        </div>
    );
};

export default FileUpload;