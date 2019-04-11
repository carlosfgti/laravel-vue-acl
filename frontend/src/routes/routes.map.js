import AdminTemplate from '@/layouts/Admin'
import Home from '@/pages/admin/home/home'

const routes = [
    {
        path: '/admin',
        component: AdminTemplate,
        children: [
            {
                path: '/',
                component: Home
            }
        ],
    }
]

export default routes
