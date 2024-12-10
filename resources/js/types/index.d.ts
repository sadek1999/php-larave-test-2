import { Config } from "ziggy-js";
import { Link } from "@inertiajs/react";

export interface User {
    id: number;
    name: string;
    email: string;
    email_verified_at?: string;
}
export type TPaginateData<T> = {
    data: T[];
    links: Record<string, string>;
};
export type TFeature = {
    id: number;
    name: string;
    description: string;
    user: User;
    upvote_count: number;
    created_at: string;
};

export type PageProps<
    T extends Record<string, unknown> = Record<string, unknown>
> = T & {
    auth: {
        user: User;
    };
    ziggy: Config & { location: string };
};
