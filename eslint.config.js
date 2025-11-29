import config from '@somehow-digital/eslint-config';
import { globalIgnores } from 'eslint/config';

export default config({
	vue: true,
	unocss: true,
}, globalIgnores(['.ddev/', 'config/project/']));
