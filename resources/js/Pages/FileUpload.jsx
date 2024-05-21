import React, { useEffect, useState } from 'react';
import Papa from 'papaparse';
import { Inertia } from '@inertiajs/inertia';
import axios from 'axios';

const FileUpload = () => {
    const [file, setFile] = useState(null);
    const [shortenedUrls, setShortenedUrls] = useState([]);
    const [error, setError] = useState(null);

    useEffect(() => {
        fetchShortenedUrls();
    });

    const fetchShortenedUrls = async () => {
        try {
            const response = await axios.get('/api/short-urls');
            console.log('resp',response);
            setShortenedUrls(response.data);
        } catch (err) {
            console.error('Error fetching short URLs: ', err);
        }
    }

    const handleFileChange = (e) => {
        setFile(e.target.files[0]);
    };

    const handleUpload = () => {
        if(file) {
            Papa.parse(file, {
                header: true,
                complete: (results) => {
                    const urls = results.data.map(row => row.long_url);

                    axios.post('/shorten', { urls })
                        .then(res => {
                            if (res.data.shortenedUrls) {
                                // Set shortened urls
                                setShortenedUrls(res.data.shortenedUrls);
                                setError(null);
                            } else if (res.data.error) {
                                setError(res.data.error);
                                setShortenedUrls([]);
                            }
                        })
                        .catch(err => {
                            setError('An error occurred while shortening URLs');
                            setShortenedUrls([]);
                        });
                },
            });
        }
    };

    return (
        <div>
            <div>
                <input type="file" onChange={handleFileChange} />
                <button onClick={handleUpload}>Upload</button>
            </div>
            {error && (
                <div className='error'>
                    <p>{error}</p>
                </div>
            )}
            {shortenedUrls.length > 0 && (
                <div>
                    <h3>Shortened URLs:</h3>
                    <ul>
                        {shortenedUrls.map((url, index) => ( 
                            <li key={index}>
                                <a href={`/${url.short_code}`} target='_blank' rel='noopener noreferrer'>
                                    {url.short_code}
                                </a> - {url.long_url}
                            </li>
                        ))}
                    </ul>
                </div>
            )}
        </div>
        
    );
};

export default FileUpload;