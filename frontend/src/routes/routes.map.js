import AdminTemplate from '@/layouts/Admin'
import Home from '@/pages/admin/home/home'
import Users from '@/pages/admin/users/users'
import Profiles from '@/pages/admin/profiles/profiles'
import Permissions from '@/pages/admin/permissions/permissions'

const routes = [
    {
        path: '/admin',
        component: AdminTemplate,
        children: [
            {
                path: 'users',
                component: Users,
                name: 'admin.users'
            },
            {
                path: 'profiles',
                component: Profiles,
                name: 'admin.profiles'
            },
            {
                path: 'permissions',
                component: Permissions,
                name: 'admin.permissions'
            },
            {
                path: '',
                component: Home,
                name: 'admin',
            }
        ],
    }
]

export default routes
