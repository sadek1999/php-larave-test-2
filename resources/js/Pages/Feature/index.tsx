import AuthLayout from '@/Layouts/AuthLayout';
import { TFeature, TPaginateData } from '@/types';
import React from 'react';

const index = ({features}:{features:TPaginateData<TFeature>}) => {
    console.log(features)
    return (
       <AuthLayout>
        <p>This is index page .............</p>
       </AuthLayout>
    );
};

export default index;
