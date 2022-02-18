export interface apiTaskReadResponseType {
    tasks: apiTaskReadResponseTaskType[]
}
export interface apiTaskReadResponseTaskType {
    id: number;
    name: string;
    default_minute: number;
    point_per_minute: number;
    status: number;
}