import React, { useState } from 'react';
import Papa from 'papaparse';
import { Inertia } from '@inertiajs/react';

const FileUpload = () => {
    const [file, setFile] = useState(null);

    const handleFileChange = (e) => {
        console.log(e.target.files[0]);
    };

    const handleUpload = () => {
        if(file) {
            console.log('file found');
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